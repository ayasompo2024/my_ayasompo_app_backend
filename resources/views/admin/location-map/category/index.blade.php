@extends('admin.layout.app')
@section('content')
    <div class="container">
        <nav aria-label="breadcrumb m-0 p-0">
            <ol class="breadcrumb m-0 pl-0 bg-transparent">
                <li class="breadcrumb-item active p-0 pl-1" aria-current="page">Location Map Category / Type / All</li>
            </ol>
        </nav>
        <a href="{{ route('admin.location-map-category.create') }}" class="btn btn-sm btn-secondary">
            <i class="bi bi-plus-square pr-2"></i> Add Location Map Category
        </a>
        @include('admin.validation-error-alert')
        <div class="mt-3 mb-5">
            <div style="display: flex;flex-wrap: wrap;gap: 10px;">
                @foreach ($categories as $item)
                    <div>
                        <div class="btn btn border mt-1 p-2" style="font-weight: 600">
                            <img src="{{ $item->image }}" width="50px">
                            <span class="ml-1">{{ $item->name }}</span>
                            <a href="{{ route('admin.location-map-category.edit', $item->id) }}" class="btn btn-sm">
                                <i title="Edit" class="bi bi-pencil-square"></i>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
