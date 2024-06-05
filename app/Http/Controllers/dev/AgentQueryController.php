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
        return view("dev.agent-quert")->with(['latest_query' => $agentQuery->latest()->first()]);
    }
    public function showMysqlQueryForm(AgentQuery $agentQuery)
    {
        return view("dev.mysql-query-form");
    }

    public function runMysqlQuery(Request $request)
    {
        // Validate the input to ensure an SQL query is provided
        $request->validate(['sqlquery' => 'required|string']);

        // Get the SQL query from the request
        $sqlQuery = $request->input('sqlquery');

        // Determine the type of query
        $queryType = strtoupper(strtok($sqlQuery, ' '));

        try {
            // Execute the query based on its type
            if ($queryType === 'SELECT') {
                $result = DB::select($sqlQuery);
                return response()->json($result);
            } else {
                // For INSERT, UPDATE, DELETE, etc.
                $result = DB::statement($sqlQuery);
                return response()->json(['success' => $result]);
            }
        } catch (\Exception $e) {
            // Handle any errors that occur during query execution
            return response()->json(['error' => $e->getMessage()], 500);
        }
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
    function runQuery(Request $request, AgentQuery $agentQuery)
    {
        $request->validate(['sqlquery' => 'required']);
        $agentQuery->create(['key' => 'TEST', 'query' => $request->sqlquery]);

        if (config('app.stage') == 'UAT')
            return "<h1>Only available on production</h1>";

        $resutl = DB::connection('oracle')->select($request->sqlquery);
        return $resutl;
    }
    function runQueryForGetReq($sql_query)
    {
        if (config('app.stage') == 'UAT')
            return "<h1>Only available on production</h1>";

        if ($sql_query == null)
            return "<h1>SQL Query Not Null</h1>";

        $resutl = DB::connection('oracle')->select($sql_query);
        return $resutl;
    }
}