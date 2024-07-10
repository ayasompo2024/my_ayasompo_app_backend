<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Messaging;
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

    public function showMulticastFormByPhones()
    {
        return view("admin.messaging.multicast-by-phone");
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

    public function sendMulticastByPhones(Request $request, MessagingService $messagingService)
    {
        $request->validate([
            'title' => 'required',
            'message' => 'required',
            'phonesString' => 'required'
        ]);
        return $messagingService->multicastByPhone($request) ?
            back()->with('success', 'Success') :
            back()->with('fail', 'fail');
    }

    function getAgentNotiList(Request $request)
    {
        $histories = Messaging::where("type", "Agent-Unicast")->paginate(30);
        return view("admin.messaging.agent-noti-list")->with(['histories' => $histories]);

    }

    function showAgentNotiForm()
    {
        return view("admin.messaging.agent-noti-form");
    }

    function sendCampaignNoti(Request $request, MessagingService $messagingService)
    {
        $request->validate(['title' => 'required', 'message' => 'required']);
        $messagingService->sendCampaignNoti($request);
        return back()->with('success', 'Success');
    }

}

