<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\MessagingService;

class MessagingController extends Controller
{
    public function index()
    {
        return view("admin.messaging.broadcast");
    }
    public function showUnicastForm($c_id)
    {
        return view("admin.messaging.unicast")->with(['c_id' => $c_id]);
    }
    public function showMulticastForm($c_ids)
    {
        return view("admin.messaging.multicast")->with(['c_ids' => $c_ids]);
    }
    public function sendAsBroadcast(Request $request, MessagingService $messagingService)
    {
        $request->validate(['title' => 'required', 'message' => 'required']);
        return $messagingService->broadcast($request) ?
            back()->with('success', 'Success') :
            back()->with('fail', 'fail');
    }
    public function sendAsUnicast(Request $request, MessagingService $messagingService)
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
    public function sendAsMulticast(Request $request, MessagingService $messagingService)
    {
        $request->validate([
            'title' => 'required',
            'message' => 'required',
            'customer_ids' => 'required'
        ]);
        return $messagingService->multicast($request) ?
            back()->with('success', 'Success') :
            back()->with('fail', 'fail');
    }
    public function history(MessagingService $messagingService)
    {
        return view("admin.messaging.history")->with(['histories' => $messagingService->histories(30)]);
    }
    public function getByCustomerID($c_id, MessagingService $messagingService)
    {
        return view("admin.messaging.history")->with(['histories' => $messagingService->getByCustomerID(30, $c_id)]);
    }
}

