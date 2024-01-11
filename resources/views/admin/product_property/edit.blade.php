@extends('admin.layout.app')
@section('content')
    <div class="container">

        <nav aria-label="breadcrumb m-0 p-0">
            <ol class="breadcrumb m-0 pl-0 bg-transparent">
                <li class="breadcrumb-item active p-0 pl-1" aria-current="page">Product / Property / Update</li>
            </ol>
        </nav>

        @include('admin.validation-error-alert')

        <div class="row mt-2">
            <div class="col-md-12 px-md-5 rounded mb-5">
                <h5 class="mt-4 pb-2 border-bottom">
                    <span class="float-right"> Update Property</span>
                    <a href="{{ url()->previous() }}"><i class="bi bi-arrow-left-square"></i></a>
                </h5>
                <form method="post" action="{{ route('admin.property.update', $product_property->id) }}">
                    @method('put')
                    @csrf

                    <div class="modal-body">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" value="{{ $product_property->title }}"
                                class="form-control form-control-sm" placeholder="Enter Name" id="title" />
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea type="text" id="editorForProperty" rows="10" style="white-space: pre-wrap;" name="desc"
                                class="form-control form-control-sm" placeholder="Enter Descriptione" id="description" />{{$product_property->desc}}</textarea>
                        </div>
                    </div>
                    <div class="modal-footer p-1 border-0">
                        <input type="submit" class="btn btn-sm bg-info" value="submit">
                        <button type="button" class="btn btn-sm bg-secondary" data-dismiss="modal">Cancle</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
