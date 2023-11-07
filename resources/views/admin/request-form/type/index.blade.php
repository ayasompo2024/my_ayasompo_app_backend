@extends('admin.layout.app')
@section('content')
    <div class="container">

        <nav aria-label="breadcrumb m-0 p-0">
            <ol class="breadcrumb m-0 pl-0 bg-transparent">
                <li class="breadcrumb-item active p-0 pl-1" aria-current="page">Request Form / Type / All</li>
            </ol>
        </nav>
        <a class="btn btn-sm btn-secondary" data-toggle="modal" data-target="#new">
            <i class="bi bi-plus-square pr-2"></i> New Request Form Type
        </a>
        @include('admin.validation-error-alert')
        <div class="mt-3 mb-5">
            <div style="display: flex;flex-wrap: wrap;gap: 10px;">
                @foreach ($requestFormType as $item)
                    <div>
                        <div class="btn btn border mt-1" style="font-weight: 600">
                            {{ $item->type }}
                            <a href="{{ route('admin.request-form.type.edit', $item->id) }}" class="btn btn-sm">
                                <i title="Edit" class="bi bi-pencil-square"></i>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="modal fade" id="new" tabindex="-1" role="dialog" aria-labelledby="newShopType"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form method="post" action="{{ route('admin.request-form.type.store') }}">
                        @csrf
                        <div class="modal-header p-3">
                            <h6 class="modal-title" id="newShopType">Add New Request Form Type </h6>
                        </div>
                        <div class="modal-body">
                            <label>Enter Type</label>
                            <input type="text" name="type" required class="form-control my-3 price"
                                placeholder="Enter Type " />
                        </div>
                        <div class="modal-body">
                            <input type="text" name="type" required class="form-control my-3 price"
                                placeholder="Enter Type " />
                        </div>
                        <div class="modal-footer p-1 border-0">
                            <input type="submit" class="btn btn-sm bg-info" value="submit">
                            <button type="button" class="btn btn-sm bg-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
