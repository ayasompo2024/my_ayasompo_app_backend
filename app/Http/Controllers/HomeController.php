<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\SmsPool;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    function downloadFileAsVCF(Request $request)
    {
        $vali = Validator::make($request->all(), [
            "name" => "required",
            "phoneno" => "required",
            "email" => "required|email",
            'position' => "required",
        ]);
        if ($vali->fails())
            return response()->json(['message' => "Validation Errors", 'errors' => $vali->errors()], 422);

        $companyName = "Aya Sompo Insurance";
        $vcardContent = "BEGIN:VCARD\nVERSION:3.0\nN:" . $request->name . "\nFN:" . $request->name . "\nTEL:" . $request->phoneno . "\nEMAIL:" . $request->email . "\nTITLE:" . $request->position . "\nORG:" . $companyName . "\nEND:VCARD\n";
        $filename = $request->name . '.vcf';
        $headers = [
            'Content-Type' => 'text/vcard',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ];
        $response = Response::make($vcardContent, 200, $headers);
        return $response;
    }

    function downloadFileAsVCFForAgent(Request $request)
    {
        $vali = Validator::make($request->all(), [
            "name" => "required",
            "phoneno" => "required",
            "type" => "required",
            "email" => "required|email",
            "license_no" => "required",
        ]);

        if ($vali->fails()) {
            return response()->json(['message' => "Validation Errors", 'errors' => $vali->errors()], 422);
        }

        $companyName = "Aya Sompo Insurance";
        $vcardContent = "BEGIN:VCARD\nVERSION:3.0\nN:" . $request->name . "\nFN:" . $request->name . "\nTEL:" . $request->phoneno . "\nEMAIL:" . $request->email . "\nTITLE:" . $request->type . "\nORG:" . $companyName . "\nEMAIL;TYPE=INTERNET:" . $request->license_no . "\nEND:VCARD\n";

        $fileContent = $vcardContent;
        $fileName = $request->input('name') . "_contact.vcf";

        return Response::make($fileContent, 200, [
            'Content-Type' => 'text/vcard',
            'Content-Disposition' => "attachment; filename=\"$fileName\""
        ]);
    }

    //you can login with existing password

    function g()
    {
        $data = [
            [
                'customer_phoneno' => '09961111192',
                'user_name' => 'Nyi Nyi Htun',
                'risk_name' => 'Nyi Nyi Htun',
                'risk_seqNo' => '00YGN2401205650',
                'policy_number' => 'AYA/YGN/AYH/24000184',
                'customer_code' => 'C000095863',
                "has" => true,
            ],
            [
                'customer_phoneno' => '09788107369',
                'user_name' => 'Win Thein Htay',
                'risk_name' => 'Win Thein Htay',
                'risk_seqNo' => '00YGN2401205810',
                'policy_number' => 'AYA/YGN/AYH/24000184',
                'customer_code' => 'C000095863',
                "has" => true
            ],
            [
                'customer_phoneno' => '09788112547',
                'user_name' => 'Kyaw Thuya',
                'risk_name' => 'Kyaw Zin Win',
                'risk_seqNo' => '00YGN2401205786',
                'policy_number' => 'AYA/YGN/AYH/24000184',
                'customer_code' => 'C000095863',
                "has" => true
            ],
            [
                'customer_phoneno' => '09982100008',
                'user_name' => 'Kyaw Zin Win',
                'risk_name' => '00YGN2401205780',
                'risk_seqNo' => 'Kyaw Zin Win',
                'policy_number' => 'AYA/YGN/AYH/24000184',
                'customer_code' => 'C000095863',
                "has" => true
            ],
            [
                'customer_phoneno' => '09750078070',
                'user_name' => 'Saw Myat Noe Aye',
                'risk_name' => 'Saw Myat Noe Aye',
                'risk_seqNo' => '00YGN2401205684',
                'policy_number' => 'AYA/YGN/AYH/24000184',
                'customer_code' => 'C000095863',
                "has" => false
            ],
            [
                'customer_phoneno' => '09423685819',
                'user_name' => 'Htin Soe lin',
                'risk_name' => 'Htin Soe lin',
                'risk_seqNo' => '00YGN2401205726',
                'policy_number' => 'AYA/YGN/AYH/24000184',
                'customer_code' => 'C000095863',
                "has" => false
            ],
        ];
        $cu = [];
        $pool = [];
        foreach ($data as $d) {
            $password = Str::random(6);
            $modelForCustomer = $this->inputForCustomer($d, $password);
            array_push($cu, $modelForCustomer);
            $smsContent = $this->getContent($d['user_name'], $d['customer_phoneno'], $password);
            $modelForSMS = $this->inputFroSmsPool($d['user_name'], $d['customer_phoneno'], $smsContent, $d['policy_number']);
            array_push($pool, $modelForSMS);
        }
        foreach ($cu as $c) {
            Customer::create($c);
        }
        foreach ($pool as $p) {
            SmsPool::create($p);
        }
        return [
            'cu' => $cu,
            'pool' => $pool
        ];
    }

    private function inputForCustomer($c, $password)
    {
        $inputForAppCustomer = [
            "customer_phoneno" => $c['customer_phoneno'],
            'user_name' => $c['user_name'],
            'password' => $password,

            "customer_code" => $c['customer_code'],
            "risk_seqNo" => $c['risk_seqNo'],
            "risk_name" => $c['risk_name'],
            "app_customer_type" => 'GROUP',
            "policy_number" => $c['policy_number'],
        ];
        return $inputForAppCustomer;
    }

    private function inputFroSmsPool($name, $phone, $content, $policy_number)
    {
        return [
            "name" => $name,
            "phone" => $phone,
            "content" => $content,
            "policy_number" => $policy_number,
            "key" => "GROUP"
        ];
    }

    private function getContent($username, $phone, $password)
    {
        return <<<EOT
Dear $username,   
Welcome to MY AYASOMPO App!
We're thrilled to have you on board. Explore our features, enjoy exclusive privileges, and make the most out of your experience. Here are your login details:

Phone no : $phone.
Password : $password

If you haven't downloaded the "My AYASOMPO" App yet, use the links below to get started:
For Android - https://play.google.com/store/apps/details?id=com.ml.ayasompo
For iOS - https://apps.apple.com/us/app/my-ayasompo/id6475663317
EOT;

    }

}


