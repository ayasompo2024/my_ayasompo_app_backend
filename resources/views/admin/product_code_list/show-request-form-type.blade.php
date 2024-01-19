@extends('admin.layout.app')
@section('content')
    <div class="container px-3">

        <nav class="pt-3">
            Product Code List / Bind With Request Form
            <a class="float-left" href="{{ url()->previous() }}"><i class="mr-3 bi bi-arrow-left-square"></i></a>
        </nav>

        @include('admin.validation-error-alert')
        <div class="mt-3 mb-5">
            <form method="POST" action="{{ route('admin.product-code-list.bind-with-request-form-type') }}">
                @csrf
                <div style="display: flex;flex-wrap: wrap;gap: 20px;">
                    @foreach ($requestFormTypes as $item)
                        <div class="btn btn border">
                            <input type="checkbox" value="{{ $item->id }}" name="requestFormTypes[]"
                                {{ in_array($item->id, array_column($bindedRequestFormTypes->toArray(), 'request_form_type_id')) ? 'checked' : '' }}>
                            {{ $item->type }}
                        </div>
                    @endforeach
                </div>
                <input type="hidden" name="product_code_list_id" value="{{ $productCodeListId }}">
                <button class="btn btn-sm btn-info mt-3 px-4">Bind</button>
            </form>
        </div>
        <div class="modal fade" id="new" tabindex="-1" role="dialog" aria-labelledby="newShopType"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form method="post" action="{{ route('admin.property.type.store') }}">
                        @csrf
                        <div class="modal-header p-3">
                            <h6 class="modal-title" id="newShopType">Add New Attribute Type </h6>
                        </div>
                        <div class="modal-body">
                            <input type="text" name="name" required class="form-control my-3 price"
                                placeholder="Attribute  Name  " />
                        </div>
                        <div class="modal-footer p-1 border-0">
                            <input type="submit" class="btn btn-sm bg-info" value="submit">
                            <button type="button" class="btn btn-sm bg-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
