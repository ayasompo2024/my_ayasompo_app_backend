<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Repositories\RequestFormTypeRepository;
use App\Services\RequestFormTypeService;
use Illuminate\Http\Request;

class RequestFormTypeController extends Controller
{
    public function index(RequestFormTypeService $requestFormTypeService)
    {
        return view('admin.request-form.type.index')->with('requestFormType', $requestFormTypeService->getAll());
    }

    public function store(Request $request, RequestFormTypeService $requestFormTypeService)
    {
        $request->validate([
            'type' => 'required',
        ]);

        return $requestFormTypeService->store($request) ?
            redirect('admin/request-form/type')->with('success', 'Success') :
            redirect('admin/request-form/type')->with('fail', 'fail');

    }

    public function edit($id, RequestFormTypeService $requestFormTypeService)
    {
        return view('admin.request-form.type.edit')->with('requestFormType', $requestFormTypeService->getByID($id));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'type' => 'required',
        ]);

        return RequestFormTypeRepository::update($id, $request->only('type')) ?
            redirect('admin/request-form/type')->with('success', 'Success') :
            redirect('admin/request-form/type')->with('fail', 'fail');
    }

    public function destroy($id)
    {
        //
    }
}
