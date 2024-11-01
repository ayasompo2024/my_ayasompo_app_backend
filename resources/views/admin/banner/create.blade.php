@extends('admin.layout.app')
@section('content')
    <div class="container">

        <div class="bg-light px-md-3 mt-md-3 mt-2 mb-5">

            {{-- Validation Error Alert --}}
            @include('admin.validation-error-alert')

            <div class="row mt-2">
                <div class="col-md-12 px-md-5 rounded mb-5">

                    <h5 class="mt-4 pb-2 border-bottom">
                        <span class="float-right"> Add New Banner</span>
                        <a href="{{ url()->previous() }}"><i class="bi bi-arrow-left-square"></i></a>
                    </h5>

                    <form class="mt-4" method="POST" action="{{ route('admin.banner.store') }}"
                        enctype="multipart/form-data" onkeydown="return event.key != 'Enter'">
                        @csrf
                        <div class="row mt-3">
                            <div class="col-lg-4">
                                <label for="link"> For </label>
                            </div>
                            <div class="col-lg-8">
                                <select name="for" class="form-control form-control-sm">
                                    <option>Home</option>
                                    <option>Splash</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-lg-4">
                                <label for="images">Image</label>
                            </div>
                            <div class="col-lg-8">
                                <div class="upload__box">
                                    <div class="upload__img-wrap"></div>
                                    <div class="upload__btn-box">
                                        <label class="btn btn-sm shadow-sm bg-secondary">
                                            <i class="bi bi-image"></i> Add Photo
                                            <input type="file" name="image" data-max_length="20" accept="image/*"
                                                class="upload__inputfile">
                                            @error('image')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-lg-4">
                                <label for="name"> Title </label>
                            </div>
                            <div class="col-lg-8">
                                <input id="titel" value="{{ old('titel') }}" type="text" name="titel"
                                    autocomplete="titel" class="form-control form-control-sm" placeholder="Enter Title">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-lg-4">
                                <label for="desc"> Description </label>
                            </div>
                            <div class="col-lg-8">
                                <textarea id="desc" value="{{ old('desc') }}" type="text" name="desc" autocomplete="desc"
                                    class="form-control form-control-sm" placeholder="Enter Desc"></textarea>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-lg-4">
                                <label for="link"> Link </label>
                            </div>
                            <div class="col-lg-8">
                                <input id="desc" value="{{ old('link') }}" type="text" name="link"
                                    autocomplete="desc" class="form-control form-control-sm" placeholder="Enter link">
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
@push('child-css')
    <style>
        .upload__inputfile {
            width: 0.1px;
            height: 0.1px;
            opacity: 0;
            overflow: hidden;
            position: absolute;
            z-index: -1;
        }


        .upload__img-wrap {
            display: flex;
            flex-wrap: wrap;
            margin: 0 -10px;
        }

        .upload__img-box {
            width: 200px;
            padding: 0 10px;
            margin-bottom: 12px;
        }

        .upload__img-close {
            width: 24px;
            height: 24px;
            border-radius: 50%;
            background-color: rgba(0, 0, 0, 0.5);
            position: absolute;
            top: 10px;
            right: 10px;
            text-align: center;
            line-height: 24px;
            z-index: 1;
            cursor: pointer;
        }

        .upload__img-close:after {
            content: "✖";
            font-size: 14px;
            color: white;
        }

        .img-bg {
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            position: relative;
            padding-bottom: 100%;
        }
    </style>
@endpush


@push('child-scripts')
    <script>
        jQuery(document).ready(function() {
            ImgUpload();
        });

        function ImgUpload() {
            var imgWrap = "";
            var imgArray = [];

            $('.upload__inputfile').each(function() {
                $(this).on('change', function(e) {
                    imgWrap = $(this).closest('.upload__box').find('.upload__img-wrap');
                    var maxLength = $(this).attr('data-max_length');

                    var files = e.target.files;
                    var filesArr = Array.prototype.slice.call(files);
                    var iterator = 0;
                    filesArr.forEach(function(f, index) {

                        if (!f.type.match('image.*')) {
                            return;
                        }

                        if (imgArray.length > maxLength) {
                            return false
                        } else {
                            var len = 0;
                            for (var i = 0; i < imgArray.length; i++) {
                                if (imgArray[i] !== undefined) {
                                    len++;
                                }
                            }
                            if (len > maxLength) {
                                return false;
                            } else {
                                imgArray.push(f);

                                var reader = new FileReader();
                                reader.onload = function(e) {
                                    var html =
                                        "<div class='upload__img-box'><div style='background-image: url(" +
                                        e.target.result + ")' data-number='" + $(
                                            ".upload__img-close").length + "' data-file='" + f
                                        .name +
                                        "' class='img-bg'><div class='upload__img-close'></div></div></div>";
                                    imgWrap.append(html);
                                    iterator++;
                                }
                                reader.readAsDataURL(f);
                            }
                        }
                    });
                });
            });

            $('body').on('click', ".upload__img-close", function(e) {
                var file = $(this).parent().data("file");
                for (var i = 0; i < imgArray.length; i++) {
                    if (imgArray[i].name === file) {
                        imgArray.splice(i, 1);
                        break;
                    }
                }
                $(this).parent().parent().remove();
            });
        }
    </script>
@endpush
