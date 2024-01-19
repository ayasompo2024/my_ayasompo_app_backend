@extends('admin.layout.app')
@section('content')
    <div class="container">

        <nav class="pt-3">
            Product Code List / All
            <a class="float-left" href="{{ url()->previous() }}"><i class="m-3 bi bi-arrow-left-square"></i></a>
            <span class="badge bg-info mr-4">
                {{ $product_code_lists->total() }}
            </span>
            <div class="float-right">
                <form action="{{ route('admin.product-code-list.search.by-product-code') }}" method="get">
                    <div class="input-group mb-2 mr-sm-2">
                        <input type="text" name="product_code" required class="form-control" placeholder="P Code">
                        <div class="input-group-prepend bg-secondary">
                            <button type="submit" class="btn btn-sm text-white"><i class="bi bi-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </nav>

        @include('admin.validation-error-alert')

        <div class="bg-light px-md-3 mt-4 mb-5">
            <table class="table table-responsive-sm">
                <thead>
                    <tr>
                        <th style="min-width: 100px">Class Code</th>
                        <th style="min-width: 150px">Class Description</th>
                        <th style="min-width: 150px">Product Code</th>
                        <th style="min-width: 120px">Product Description</th>
                        <th style="min-width: 200px">Bind With Request Form </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($product_code_lists as $product_code_list)
                        <tr>
                            <td> {{ $product_code_list->class_code }} </td>
                            <td> {{ $product_code_list->class_description }} </td>
                            <td> {{ $product_code_list->product_code }} </td>
                            <td> {{ $product_code_list->product_description }} </td>
                            <td>
                                <a href="{{ route('admin.product-code-list.show-request-form-type', $product_code_list->id) }}"
                                    class="btn btn-sm btn-info float-right">
                                    Bind <i class="bi bi-arrow-return-right"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="float-right pb-3">
                {!! $product_code_lists->links('pagination::bootstrap-4') !!}
            </div>
        </div>
    </div>
@endsection
