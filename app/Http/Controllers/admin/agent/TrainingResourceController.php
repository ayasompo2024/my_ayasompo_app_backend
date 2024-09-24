<?php

namespace App\Http\Controllers\admin\agent;

use App\Http\Controllers\Controller;
use App\Models\TrainingResource;
use App\Traits\UploadFileToAzurBlobStorage;
use Illuminate\Http\Request;

class TrainingResourceController extends Controller
{
    use UploadFileToAzurBlobStorage;

    public function index(TrainingResource $trainingResource)
    {
        $trs = $trainingResource->all();

        return view('admin.agent.training-resource.index', compact('trs'));
    }

    public function create()
    {
        return view('admin.agent.training-resource.create');
    }

    public function store(Request $request, TrainingResource $trainingResource)
    {
        $request->validate(['title' => 'required', 'training_file' => 'required']);
        $input = $request->only('title', 'description', 'sort', 'description_for_admin');
        $training_file = $this->uploadPhotoToAzure($request->training_file, false);
        if (empty($training_file)) {
            return back()->with('fail', 'fail');
        }
        $input['file'] = $training_file[0]['url'];
        $status = $trainingResource->create($input);

        return $status ? back()->with('success', 'Success') :
            back()->with('fail', 'fail');
    }

    public function toggleStatus($id, TrainingResource $trainingResource)
    {
        $tr = $trainingResource->find($id);
        $tr->update(['status' => ! $tr->status]);

        return $tr ? back()->with('success', 'Success') :
            back()->with('fail', 'fail');
    }

    public function show($id)
    {
        $tr = TrainingResource::find($id);

        return view('admin.agent.training-resource.edit', compact('tr'));
    }

    public function edit($id)
    {
        $tr = TrainingResource::find($id);

        return view('admin.agent.training-resource.edit', compact('tr'));
    }

    public function update(Request $request, $id)
    {
        $request->validate(['title' => 'required']);
        $input = $request->only('title', 'description', 'sort', 'description_for_admin');

        if ($request->training_file) {
            $training_file = $this->uploadPhotoToAzure($request->training_file, false);
            if (empty($training_file)) {
                return back()->with('fail', 'fail');
            }
            $input['file'] = $training_file[0]['url'];
        }
        $status = TrainingResource::find($id)->update($input);

        return $status ? back()->with('success', 'Success') :
            back()->with('fail', 'fail');
    }

    public function destroy($id)
    {
        $status = TrainingResource::destroy($id);

        return $status ? redirect()->back()->with('success', 'Success') : redirect()->back()->with('fail', 'fail');
    }
}
