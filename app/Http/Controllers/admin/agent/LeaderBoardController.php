<?php

namespace App\Http\Controllers\admin\agent;

use App\Http\Controllers\Controller;
use App\Imports\LeaderBoardImport;
use App\Models\Customer;
use App\Models\LeaderBoard;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class LeaderBoardController extends Controller
{
    public function index(LeaderBoard $leader_board)
    {
        return view('admin.agent.leader-board.index')->with(['leaders' => $leader_board->with('profile')->orderByDesc("points")->get()]);
    }
    public function create()
    {
    }
    public function store(Request $request)
    {
        $request->validate(['leaderboard' => 'required|mimes:xlsx,csv']);
        LeaderBoard::truncate();
        Excel::import(new LeaderBoardImport, $request->file('leaderboard'));
        return redirect()->back()->with('success', 'Leaderboard imported successfully.');
    }
    public function show($id)
    {
        return $this->edit($id);
    }
    public function edit($id)
    {
        $leader = LeaderBoard::find($id);
        return view('admin.agent.leader-board.edit', compact('leader'));
    }
    public function update(Request $request, $id)
    {
        $learder = LeaderBoard::find($id);
        $input = $request->only("phone", 'points'); 
        if ($learder->campaign_title != $request->campaign_title) {
            LeaderBoard::query()->update(['campaign_title' => $request->campaign_title]);
            $input['campaign_title'] = $request->campaign_title;
        }
        if ($learder->product_code != $request->product_code) {
            LeaderBoard::query()->update(['product_code' => $request->product_code]);
            $input['product_code'] = $request->product_code;
        }
        if ($learder->period_from != $request->period_from) {
            LeaderBoard::query()->update(['period_from' => $request->period_from]);
            $input['period_from'] = $request->period_from;
        }
        if ($learder->period_to != $request->period_to) {
            LeaderBoard::query()->update(['period_to' => $request->period_to]);
            $input['period_to'] = $request->period_to;
        }
        if ($learder->phone != $request->phone) {
            $agentAccount = $this->getAgentProfileByPhone($request->phone);
            $input['customer_id'] = $agentAccount->id;
            $input['phone'] = $request->phone;
        }
        $status = LeaderBoard::find($id)->update($input);
        return $status ? back()->with('success', 'Success.') : back()->with('fail', 'fail');
    }
    public function destroy($id)
    {
        $status = LeaderBoard::destroy($id);
        return $status ? redirect()->back()->with('success', 'Success') : redirect()->back()->with('fail', 'fail');
    }
    private function getAgentProfileByPhone($phone)
    {
        return Customer::with('agentInfo')->where('customer_phoneno', $phone)->where('app_customer_type', 'AGENT')->first();
    }
}

