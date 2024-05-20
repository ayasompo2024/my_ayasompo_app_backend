@extends('admin.layout.app')
@section('content')
    <div class="container">
        <div class="bg-light px-md-3 mt-md-3 mt-2 mb-5">
            @include('admin.validation-error-alert')
            <div class="row mt-2">
                <div class="col-md-12 px-md-5 rounded mb-5">
                    <h5 class="mt-4 pb-2 border-bottom">
                        <span class="float-right"> Add Training Resource</span>
                        <a href="{{ url()->previous() }}"><i class="bi bi-arrow-left-square"></i></a>
                    </h5>
                    <form class="mt-4" method="POST" action="{{ route('admin.training-resource.store') }}"
                        enctype="multipart/form-data" onkeydown="return event.key != 'Enter'">
                        @csrf
                        <div class="row mt-3">
                            <div class="col-lg-4">
                                <label for="file"> File </label>
                            </div>
                            <div class="col-lg-8">
                                <input id="file" type="file" name="training_file" required
                                    autocomplete="title" class="form-control form-control-sm py-0 pl-2" placeholder="Enter title">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-lg-4">
                                <label for="name"> Title </label>
                            </div>
                            <div class="col-lg-8">
                                <input id="title" value="{{ old('title') }}" type="text" name="title" required
                                    autocomplete="title" class="form-control form-control-sm" placeholder="Enter title">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-lg-4">
                                <label for="desc"> Description </label>
                            </div>
                            <div class="col-lg-8">
                                <textarea id="desc" value="{{ old('description') }}" type="text" name="description" autocomplete="description"
                                    class="form-control form-control-sm" placeholder="Enter description"></textarea>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-lg-4">
                                <label for="link"> Sort(Order) </label>
                            </div>
                            <div class="col-lg-8">
                                <input id="desc" value="{{ old('link') }}" type="number" name="sort"
                                    autocomplete="desc" class="form-control form-control-sm"
                                    placeholder="Enter Sort Number">
                            </div>
                        </div>
                        <div class="form-group my-3">
                            <button type="submit" class="btn bg-info btn-sm px-4 float-right">Create </button>
                        </div>
                        <br /><br />
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
