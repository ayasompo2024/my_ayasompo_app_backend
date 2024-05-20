<?php

namespace App\Http\Controllers\admin\agent;

use App\Http\Controllers\Controller;
use App\Models\TrainingResource;
use Illuminate\Http\Request;

class TrainingResourceController extends Controller
{


    public function index()
    {
        $data = [];
        return view('admin.agent.training-resource.index', compact("data"));
    }


    public function create()
    {
        return view('admin.agent.training-resource.create');
    }


    public function store(Request $request, TrainingResource $trainingResource)
    {
        $request->validate(['title' => "required", 'file' => "required"]);
        $input = $request->only('title', 'description', 'sort');
        if ($request->training_file) {
            $url = 'asd';
            $input['file'] = $url;
        }
        $status = $trainingResource->create($input);
        return $status ? back()->with('success', 'Success') :
            back()->with('fail', 'fail');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
