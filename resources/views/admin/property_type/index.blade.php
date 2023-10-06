@extends('admin.layout.app')
@section('content')
    <div class="container">

        <nav aria-label="breadcrumb m-0 p-0">
            <ol class="breadcrumb m-0 pl-0 bg-transparent">
                <li class="breadcrumb-item active p-0 pl-1" aria-current="page">Product / All</li>
            </ol>
        </nav>
        <a class="btn btn-sm btn-secondary" data-toggle="modal" data-target="#new">
            <i class="bi bi-plus-square pr-2"></i> Add New Property Type
        </a>
        @include('admin.validation-error-alert')
        <div class="mt-3 mb-5">
            <div style="display: flex;flex-wrap: wrap;gap: 10px;">
                @foreach ($type as $item)
                    <div>
                        <div class="btn btn border mt-1" style="font-weight: 600">
                            {{ $item->name }}
                            <form class="d-inline" action="{{ route('admin.property.type.update', $item->id) }}"
                                method="post">
                                @method('put') @csrf
                                <button class="btn btn-sm">
                                    @if ($item->status == 1)
                                        <i title="Close" class="bi bi-check-circle mx-2"></i>
                                    @else
                                        <i title="Open" class="bi bi-x-circle text-warning mx-2"></i>
                                    @endif
                                </button>
                            </form>
                            |
                            <button class="btn btn-sm">
                                <i title="Edit" class="bi bi-pencil-square"></i>
                            </button>
                            |
                            <form class="d-inline" action="{{ route('admin.property.type.destroy', $item->id) }}"
                                method="post">
                                @method('delete') @csrf
                                <button class="btn btn-sm">
                                    <i title="Delete" class="bi bi-trash mx-2"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="modal fade" id="new" tabindex="-1" role="dialog" aria-labelledby="newShopType"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form method="post" action="{{ route('admin.property.type.store') }}">
                        @csrf
                        <div class="modal-header p-3">
                            <h6 class="modal-title" id="newShopType">Add New Attribute Type </h6>
                        </div>
                        <div class="modal-body">
                            <input type="text" name="name" required class="form-control my-3 price"
                                placeholder="Attribute  Name  " />
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
