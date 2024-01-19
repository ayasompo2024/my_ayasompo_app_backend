@extends('admin.layout.app')
@section('content')
    <div class="container">

        <nav aria-label="breadcrumb m-0 p-0">
            <ol class="breadcrumb m-0 pl-0 bg-transparent">
                <li class="breadcrumb-item active p-0 pl-1" aria-current="page">Product / All</li>
            </ol>
        </nav>
        <a href="{{ route('admin.banner.create') }}" class="btn btn-sm btn-secondary">
            <i class="bi bi-plus-square pr-2"></i> Add New Banner
        </a>
        <div class="bg-light mt-3 mb-5">
            <div class="row">
                @foreach ($banners as $banner)
                    <div class="col-md-3">
                        <div class="card pb-0 pt-3 px-3">
                            @include('admin.banner._photo_card')
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
