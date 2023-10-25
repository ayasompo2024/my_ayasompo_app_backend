@extends('admin.layout.app')
@section('content')
    <div class="container">

        <nav aria-label="breadcrumb m-0 p-0">
            <ol class="breadcrumb m-0 pl-0 bg-transparent">
                <li class="breadcrumb-item active p-0 pl-1" aria-current="page">Product / {{ $product->name }} / Edit </li>
            </ol>
        </nav>
        @include('admin.validation-error-alert')

        <div class="row mt-2">
            <div class="col-md-12 px-md-5 rounded mb-5">
                <h5 class="mt-4 pb-2 border-bottom">
                    <span class="float-right"> Edit Product</span>
                    <a href="{{ url()->previous() }}"><i class="bi bi-arrow-left-square"></i></a>
                </h5>
                <form class="mt-4" method="POST" action="{{ route('admin.product.update', $product->id) }}"
                    enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    @include('admin.product.partials._edit_product_form')
                    <div class="form-group my-3">
                        <button type="submit" class="btn bg-info btn-sm px-4 float-right">Update </button>
                    </div>
                    <br /><br />
                </form>
            </div>
        </div>
    </div>
@endsection
