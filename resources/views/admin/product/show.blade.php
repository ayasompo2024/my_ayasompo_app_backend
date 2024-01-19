@extends('admin.layout.app')
@section('content')
<div class="container">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb m-0 pl-3 bg-transparent">
            <li class="breadcrumb-item active p-0" aria-current="page">Product / {{$product->name}}
            </li>
        </ol>
    </nav>

    <a class="btn btn-secondary btn-sm  px-2 ml-md-3" href="{{ url()->previous() }}">
        <i class="bi bi-arrow-left-square text-white"></i>
    </a>

    <div class="bg-light px-md-3  mb-5 mt-2">
        <div class="row">
            <div class="col-md-6 row">
                <div class="col-md-12">
                    <div class="card px-4 pt-3">
                        <div class="card-title d-flex justify-content-between px-3 pt-3">
                            <dvi>
                                <h5 class="card-title">{{ $product->name}}</h5> <br>
                                <h6 class="mb-2 text-muted">{{ $product->title}}</h6>
                            </dvi>
                            <dvi class="float-right">
                                <image src="{{ $product->thumbnail}}" height="80px" />
                            </dvi>
                        </div>
                        <div class="card-body">
                            <p class="card-text">
                                {{ $product->brief_description}}
                            </p>
                            <div class="row">
                                <div class="col-6">
                                    <div class="card p-3 shadow-none bg-light text-center">
                                        Coverage
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="card p-3 shadow-none bg-light text-center">
                                        Benefits
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="card p-3 shadow-none bg-light text-center">
                                        Eligibility
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="card p-3 shadow-none bg-light text-center">
                                        Product Highlight
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection