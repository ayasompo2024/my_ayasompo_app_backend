@extends('admin.layout.app')
@section('content')
    <div class="container">

        <div class="px-md-5 pt-5">
            <div class="col-md-12 px-2 m">
                <a class="btn btn-sm ml-2 mt-0 mb-2 ">
                    <i class="bi bi-arrow pr-2"></i>
                </a>
                <span class="float-right px-2">Property type / All</span>
            </div>
            <form action="{{ route('admin.property.type.update', $property_type->id) }}" method="POST">
                @csrf
                @method('put')
                <div class="modal-header border-0 px-3">
                    <h6 class="modal-title">Update Property Type </h6>
                </div>
                <div class="modal-body mt-0 pt-0">
                    <input type="text" name="name" value="{{ $property_type->name }}" required
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
