@extends('admin.layout.app')
@section('content')
    <div class="container">

        <nav aria-label="breadcrumb m-0 p-0">
            <ol class="breadcrumb m-0 pl-0 bg-transparent">
                <li class="breadcrumb-item active p-0 pl-1" aria-current="page">Product / All</li>
            </ol>
        </nav>
        <a href="{{ route('admin.product.create') }}" class="btn btn-sm btn-secondary">
            <i class="bi bi-plus-square pr-2"></i> Add New Products
        </a>
        <div class="bg-light mt-3 mb-5">
            <div class="row">
                @foreach ($products as $product)
                    <div class="col-md-6">
                        <div class="card px-4 pt-3">
                            <div class="card-title d-flex justify-content-between px-3 pt-3">
                                <div>
                                    <h5 class="card-title">{{ $product->name }}</h5> <br>
                                    <h6 class="mb-2 text-muted">{{ $product->title }}</h6>
                                </div>
                                <div class="float-right">
                                    <img src="{{ $product->thumbnail }}" height="30px" />
                                </div>
                            </div>
                            <div class="card-body pb-3">
                                <p class="card-text">
                                    {{ $product->brief_description }}
                                </p>
                                <div class="row">
                                    @foreach ($property as $item)
                                        <div class="col-6">
                                            <div class="card p-3 shadow-none bg-light text-center">
                                                <a
                                                    href="{{ route('admin.product.property', ['product_id' => $product->id, 'property_type_id' => $item->id]) }}">{{ $item->name }}</a>
                                            </div>
                                        </div>
                                    @endforeach
                                    <div class="col-12">
                                        <div class="card p-3 shadow-none bg-light text-center">
                                            <a class="text-dark font-weight-bold"
                                                href="{{ route('admin.product.faq', ['product_id' => $product->id]) }}">FAQ</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="border-top mt-1">

                                    <form class="d-inline" action="{{ route('admin.product.change-status', $product->id) }}"
                                        method="post">
                                        @method('put') @csrf
                                        <button class="btn btn-sm p-0">
                                            @if ($product->status)
                                                <i title="Close" class="bi bi-check-circle mx-2"></i>
                                            @else
                                                <i title="Open" class="bi bi-x-circle text-warning mx-2"></i>
                                            @endif
                                        </button>
                                    </form>
                                    <a href="{{ route('admin.product.edit', $product->id) }}" class="btn btn-sm p-0">
                                        <i title="Delete" class="bi bi-pencil-square"></i>
                                    </a>
                                    <form class="d-inline" action="{{ route('admin.product.destroy', $product->id) }}"
                                        method="post">
                                        @method('delete') @csrf
                                        <button class="btn btn-sm p-0">
                                            <i title="Delete" class="bi bi-trash mx-2"></i>
                                        </button>
                                    </form>
                                    <a href="{{ route('admin.product.edit', $product->id) }}"
                                        class="btn btn-sm bg-info mt-1 float-right">
                                        Bind With Request Form
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
