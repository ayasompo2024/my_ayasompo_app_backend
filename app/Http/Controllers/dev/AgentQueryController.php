<?php

namespace App\Http\Controllers\dev;

use App\Http\Controllers\Controller;
use App\Models\AgentQuery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AgentQueryController extends Controller
{

    public function index(AgentQuery $agentQuery)
    {
        $queries = $agentQuery->all();
        return view("dev.agent-quert", compact('queries'));
    }

    public function store(Request $request, AgentQuery $agentQuery)
    {
        $request->validate([
            'key' => "required",
            'query' => "required",
        ]);
        return $agentQuery->create($request->only("key", 'query')) ? back()->with(['success' => 'Successfully!']) :
            back()->with(['fail' => 'Fail']);
    }

    function runQuery($agentQuery)
    {
        $resutl = DB::connection('oracle')->select($agentQuery);
        return $resutl;
    }
}