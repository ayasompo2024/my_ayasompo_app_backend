@extends('admin.layout.app')
@section('content')
    <div class="container px-3">
        <div class="pt-3">
            Training Resource
            <a href="{{ route('admin.training-resource.create') }}" class="btn btn-sm btn-danger float-right">
                <i class="bi bi-plus-square pr-2"></i> Add
            </a>
        </div>
        <div class="mt-3 mb-5">

        </div>
    </div>
@endsection
