<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

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

}


