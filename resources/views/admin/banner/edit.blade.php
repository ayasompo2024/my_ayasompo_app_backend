@extends('admin.layout.app')
@section('content')
    <div class="container">

        <div class="bg-light px-md-3 mt-md-3 mt-2 mb-5">


            @include('admin.validation-error-alert')

            <div class="row mt-2">
                <div class="col-md-12 px-md-5 rounded mb-5">

                    <h5 class="mt-4 pb-2 border-bottom">
                        <span class="float-right"> Update Banner</span>
                        <a href="{{ url()->previous() }}"><i class="bi bi-arrow-left-square"></i></a>
                    </h5>

                    <form class="mt-4" method="POST" action="{{ route('admin.banner.update', $banner->id) }}"
                        enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="row">
                            <div class="col-lg-4">
                                <label for="images">Image</label>
                            </div>
                            <div class="col-lg-8">
                                <div class="card old-photo"
                                    style="width: 200px;height: 200px;background-size: cover; background-image: url({{ $banner->image }})">
                                </div>
                                <div class="preview-container" style="display: none">
                                    <div id="imagePreview" style="width: 200px;height: 200px;background-size: cover;">
                                        <button type="button" onclick="removeNewphoto()"
                                            class="float-right btn btn-sm bg-warning mt-1 mr-1"><i
                                                class="bi bi-x-circle-fill"></i></button>
                                    </div>
                                </div>
                                <div style="position: absolute;top:165px;left:12px;">
                                    <label class="btn btn-sm btn-info" for="image">
                                        <i class="bi bi-cloud-arrow-up"></i>
                                        <input type="file" hidden name="image" accept="image/*" id="image">
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-lg-4">
                                <label for="name"> Title </label>
                            </div>
                            <div class="col-lg-8">
                                <input id="title" value="{{ $banner->title }}" type="text" name="title"
                                    autocomplete="title" class="form-control form-control-sm" placeholder="Enter Title">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-lg-4">
                                <label for="desc"> Description </label>
                            </div>
                            <div class="col-lg-8">
                                <textarea id="desc" type="text" name="desc" autocomplete="desc" class="form-control form-control-sm"
                                    placeholder="Enter Desc">{{ $banner->desc }}</textarea>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-lg-4">
                                <label for="link"> Link </label>
                            </div>
                            <div class="col-lg-8">
                                <input id="desc" value="{{ $banner->link }}" type="text" name="link"
                                    autocomplete="desc" class="form-control form-control-sm" placeholder="Enter link">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-lg-4">
                                <label for="link"> Sort(Order) </label>
                            </div>
                            <div class="col-lg-8">
                                <input id="desc" value="{{ $banner->sort }}" type="number" name="sort"
                                    autocomplete="desc" class="form-control form-control-sm"
                                    placeholder="Enter Sort Number">
                            </div>
                        </div>
                        <div class="form-group my-3">
                            <button type="submit" class="btn bg-info btn-sm px-4 float-right">Update </button>
                        </div>
                        <br /><br />
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('child-scripts')
    <script>
        $(document).ready(function() {
            $('#image').on('change', function() {
                var selectedFiles = this.files;
                if (selectedFiles.length > 0) {
                    $('.old-photo').hide();
                    $('.preview-container').show();
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
                    };
                    reader.readAsDataURL(selectedFiles[0]);
                }
            });
        });
        const removeNewphoto = () => {
            $('.preview-container').hide();
            $('.old-photo').show();
        }
    </script>
@endpush
