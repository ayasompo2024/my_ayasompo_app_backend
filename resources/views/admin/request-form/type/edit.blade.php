@extends('admin.layout.app')
@section('content')
    <div class="container">

        <div class="px-md-5 pt-5">
            <div class="col-md-12 px-2 m">
                <a class="btn mt-0 mb-2 ">
                    <i class="bi bi-arrow-left-square-fill text-info"></i>
                </a>
                <span class="float-right px-2">Request Form Type / Edit</span>
            </div>
            <form action="{{ route('admin.request-form.type.update', $requestFormType->id) }}" method="POST">
                @csrf
                @method('put')
                <div class="modal-header border-0 px-3">
                    <h6 class="modal-title">Update Request Form Type </h6>
                </div>
                <div class="modal-body mt-0 pt-0">
                    <input type="text" name="type" value="{{ $requestFormType->type }}" required
                        class="form-control " />
                </div>
                <div class="modal-footer p-1 border-0 ">
                    <button type="submit" class="btn btn-sm btn-secondary" style="z-index: 1000;">
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
