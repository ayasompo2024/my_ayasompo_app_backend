<?php

namespace App\Http\Controllers\dev;

use App\Http\Controllers\Controller;
use DirectoryIterator;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Cache;

class DevOperationController extends Controller
{
    public function index()
    {
        $files = File::files('./../DOC');
        rsort($files);
        return view('dev.doc.index', compact(['files']));
        //return Storage::download('folder/file');
    }

    public function getContent($file)
    {
        $files = File::files('./../DOC');
        rsort($files);
        $content = File::get('./../DOC/' . $file);
        return view('dev.doc.content', compact(['files', 'content']));
    }

    public function showDeploymentUI()
    {
        return view('dev.show-deploy-ui');
    }

    function OneClickDeploy()
    {
        $output = '';
        $consoleResult = [];
        if (!chdir('..')) {
            $consoleResult[] = "Error changing directory";
            return $consoleResult;
        }
        getcwd();
        shell_exec("cd storage/logs && rm laravel.log");

        exec("git add . ", $output, $returnCode);
        $commitMessage = "Auto commit message on " . date('Y-m-d H:i:s');
        $escapedCommitMessage = escapeshellarg($commitMessage);
        exec("git commit -m $escapedCommitMessage", $output, $returnCode);
        array_push($consoleResult, $output);

        // exec("git fetch", $output, $returnCode);
        // array_push($consoleResult, $output);

        exec("git pull --force", $output, $returnCode);
        array_push($consoleResult, $output);

        return $consoleResult;
    }

    public function terminal()
    {
        return view('dev.terminal');
    }

    //AJAX
    public function command(Request $req)
    {
        $validator = Validator::make($req->all(), [
            "command" => "required",
        ]);
        if ($validator->fails())
            return $this->respondValidationErrors("Validation Error", $validator->errors(), 400);
        $output = '';
        if (!chdir('..')) {
            $consoleResult[] = "Error changing directory";
            return $consoleResult;
        }
        getcwd();
        exec($req->command, $output, $returnCode);
        return $output;
    }

    function showeEnvValue()
    {
        $stage = config('app.stage');
        $csharp_server_token_ = Cache::get('token_for_internal');
        $crm_token = Cache::get('CRM_API_Token');
        $send_sms_url = config('app.ayasompo_base_url') . 'sms/sendsms';
        $create_inquiry_case_url = config("app.CRM_BASE_URL") . "api/data/v9.1/incidents";

        $serviceRoot = config("app.service_root");
        $cusCode = "X0000";
        $get_individual_customer_id_by_cus_code_api_url = $serviceRoot . "contacts?\$select=fullname&\$filter=ayasompo_customercode eq '" . $cusCode . "'";
        $get_coorporate_customer_id_by_cus_code_api_url = $url = $serviceRoot . "accounts?\$select=name&\$filter=ayasompo_code eq '" . $cusCode . "'";

        $case_id = "X032323";
        $get_case_number_by_ayas_case_id = config("app.CRM_BASE_URL") . "api/data/v9.1/incidents?\$select=incidentid,ayasompo_casenumber&\$filter=ayasompo_caseid eq '" . $case_id . "'";

        $crm_enquiry_product_type = config('app.enquiry_product_type');
        $crm_enquiry_types = config('app.enquiry_type');
        $crm_account_handler = config('app.account_handler');

        $create_motor_case_api_url = config("app.CREATE_CLAIM_CASE_BASE_URL") . "api/external/claimprocess/claimcase/motor";
        $create_non_motor_case_api_url = config("app.CREATE_CLAIM_CASE_BASE_URL") . "api/external/claimprocess/claimcase/non-motor";
        $upload_file_url = config("app.FILE_UPLOAD_BASE_URL") . "api/external/files";

        $syasompo_base_url  = config('app.ayasompo_base_url');

        $env_values = [
            "stage" => $stage,
            "csharp_server_token_" => $csharp_server_token_,
            "crm_token" => $crm_token,
            "send_sms_url" => $send_sms_url,
            "create_inquiry_case_url" => $create_inquiry_case_url,
            "serviceRoot" => $serviceRoot,
            "get_individual_customer_id_by_cus_code_api_url" => $get_individual_customer_id_by_cus_code_api_url,
            "get_coorporate_customer_id_by_cus_code_api_url" => $get_coorporate_customer_id_by_cus_code_api_url,
            "get_case_number_by_ayas_case_id" => $get_case_number_by_ayas_case_id,
            "crm_enquiry_product_type" => $crm_enquiry_product_type,
            "crm_enquiry_types" => $crm_enquiry_types,
            "crm_account_handler" => $crm_account_handler,
            "create_motor_case_api_url" => $create_motor_case_api_url,
            "create_non_motor_case_api_url" => $create_non_motor_case_api_url,
            "upload_file_url" => $upload_file_url,
            'syasompo_base_url' => $syasompo_base_url,
            'crm_base_url' => config('app.CRM_BASE_URL')
        ];
        return view('dev.show-env-value-ui')->with(['env_values' => $env_values]);
    }
}

// {
//     "policyno": "AYA/YGN/FFI/23000919",
//     "customers": [
//         {
//             "customer_code": "C00050892",
//             "customer_type": "INDIVIDUAL",
//             "customer_name": "AUNG HTET MAUNG",
//             "customer_phoneno": "+959950802344",
//             "customer_nrc": "12/TAMANA(N)119658"
//         }
//     ]
// }

































