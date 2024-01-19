@extends('admin.layout.app')
@section('content')
    <div class="container">
        <nav aria-label="breadcrumb m-0 p-0">
            <ol class="breadcrumb m-0 pl-0 bg-transparent">
                <li class="breadcrumb-item active p-0 pl-1" aria-current="page">Location Map / All</li>
            </ol>
        </nav>
        <a href="{{ route('admin.location-map.create') }}" class="btn btn-sm btn-secondary">
            <i class="bi bi-plus-square pr-2"></i> Add Location Map
        </a>
        @include('admin.validation-error-alert')
        <div class="mt-3 mb-5">
            <div class="row">
                @foreach ($location_maps as $item)
                    <div class="col-md-4">
                        <div class="card p-3 shadow-sm border">
                            <div>
                                <span class="badge bg-info mr-2">{{ $item->sort }} </span> {{ $item->name }}
                            </div>
                            <div class="rounded border bg-info"
                                style="width: 100; height: 150px;
                                background-size: cover;
                                 background-image: url({{ $item->image }})">
                            </div>
                            <div class="mt-2">
                                <small> <i class="bi bi-telephone mr-2"></i> {{ $item->phone }}</small>
                            </div>
                            <div class="mt-2">
                                <i class="bi bi-clock mr-2"></i>
                                <small> {{ $item->open_hour }} - {{ $item->close_hour }}</small>
                            </div>
                            <div class="mt-2">
                                <i class="bi bi-calendar mr-2"></i>
                                <small>{{ $item->open_days }}</small>
                            </div>
                            <div class="mt-2">
                                <i class="bi bi-geo-alt mr-2"></i>
                                <small class="card-text m">{{ $item->address }} </small>
                            </div>
                            <div class="border-top mt-2">
                                <a href="{{ route('admin.location-map.edit', $item->id) }}" class="btn btn-sm p-0">
                                    <i title="Delete" class="bi bi-pencil-square"></i>
                                </a>
                                <form class="d-inline" action="{{ route('admin.location-map.destroy', $item->id) }}"
                                    method="post">
                                    @method('delete') @csrf
                                    <button class="btn btn-sm p-0">
                                        <i title="Delete" class="bi bi-trash mx-2"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
