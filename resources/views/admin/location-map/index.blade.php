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
                    <div class="col-md-6">
                        <div class="card p-2">
                            {{ $item->name }}
                            <div class="row">
                                <div class="col-md-6">
                                    <img src="{{ $item->image }}" width="100%" />
                                </div>
                                <div class="col-md-6">
                                    <div>
                                        <i class="bi bi-telephone mr-2"></i> {{ $item->phone }}
                                    </div>
                                    <div class="mt-2">
                                        <i class="bi bi-clock mr-2"></i>
                                        {{ $item->open_hour }} - {{ $item->close_hour }}
                                    </div>
                                    <div class="mt-2">
                                        <i class="bi bi-calendar mr-2"></i>
                                        <small>{{ $item->open_days }}</small>
                                    </div>
                                    <div class="mt-2">
                                        <i class="bi bi-geo-alt mr-2"></i>
                                        <small class="card-text">{{ $item->address }} </small>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <a href="{{ route('admin.location-map-category.edit', $item->id) }}" class="btn btn-sm">
                                    <i title="Edit" class="bi bi-pencil-square"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
