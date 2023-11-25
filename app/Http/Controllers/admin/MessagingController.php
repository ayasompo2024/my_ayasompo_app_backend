<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\MessagingService;

class MessagingController extends Controller
{
    public function index()
    {
        return view("admin.messaging.index");
    }
    public function showUnicastForm($c_id)
    {
        return view("admin.messaging.unicast")->with(['c_id' => $c_id]);
    }
    public function send(Request $request, MessagingService $messagingService)
    {
        $request->validate([
            'title' => 'required',
            'message' => 'required',
            'customer_id' => 'required'
        ]);
        return $messagingService->unicast($request) ?
            back()->with('success', 'Success') :
            back()->with('fail', 'fail');
    }
}

