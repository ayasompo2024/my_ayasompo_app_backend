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
            "phoneno" => "required"
        ]);
        if ($vali->fails())
            return response()->json(['message' => "Validation Errors", 'errors' => $vali->errors()], 422);
        $vcardContent = "BEGIN:VCARD\nVERSION:3.0\nFN:" . $request->name . "\nTEL:" . $request->phoneno . "\nEND:VCARD\n";
        $filename = $request->name . '.vcf';
        $headers = [
            'Content-Type' => 'text/vcard',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ];
        $response = Response::make($vcardContent, 200, $headers);
        return $response;
    }
}
