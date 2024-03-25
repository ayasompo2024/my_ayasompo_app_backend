<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

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

    function downloadFileAsVCF($id)
    {
        $emp = Customer::with('employeeInfo')->find($id);
        if ($emp->app_customer_type != 'EMPLOYEE')
            return ['message' => "Must Be EMPLOYEE User Type"];

        $vcardContent = "BEGIN:VCARD\nVERSION:3.0\nFN:" . $emp->user_name . "\nTEL:" . $emp->customer_phoneno . "\nEND:VCARD\n";
        $filename = $emp->user_name . '.vcf';
        $headers = [
            'Content-Type' => 'text/vcard',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ];
        $response = Response::make($vcardContent, 200, $headers);
        return $response;
    }
}
