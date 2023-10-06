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
                <div class="col-md-3">
                    @foreach ($banners as $product)
                        @include('admin.banner._photo_card')
                    @endforeach
                </div>
            </div>
        </div>

    </div>
@endsection
