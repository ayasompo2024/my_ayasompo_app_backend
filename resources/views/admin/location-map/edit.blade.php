@extends('admin.layout.app')
@section('content')
    <div class="container">
        <div class="bg-light px-md-3 mt-md-3 mt-2 mb-5">
            @include('admin.validation-error-alert')
            <div class="row mt-2">
                <div class="col-md-12 px-md-5 rounded mb-5">
                    <h5 class="mt-4 pb-2 border-bottom">
                        <span class="float-right"> Add Location Map Category</span>
                        <a href="{{ url()->previous() }}"><i class="bi bi-arrow-left-square"></i></a>
                    </h5>
                    <form class="mt-4" method="POST" action="{{ route('admin.location-map.update', $location_map->id) }}"
                        enctype="multipart/form-data" onkeydown="return event.key != 'Enter'">
                        @method('PUT')
                        @csrf
                        <div class="row mt-3">
                            <div class="col-lg-4"><label for="description">Image</label></div>
                            <div class="col-lg-8" style="position: relative">
                                <div class="card old-photo bg-info"
                                    style="width: 200px;height: 200px;background-size: cover; background-image: url({{ $location_map->image }})">
                                </div>
                                <div class="preview-container" style="display: none">
                                    <div id="imagePreview" style="width: 200px;height: 200px;background-size: cover;">
                                        <button type="button" onclick="removeNewphoto()"
                                            class="float-right btn btn-sm bg-warning mt-1 mr-1"><i
                                                class="bi bi-x-circle-fill"></i></button>
                                    </div>
                                </div>
                                <div style="position: absolute;top:165px;left:12px;">
                                    <label class="btn btn-sm btn-info" for="thumbnail">
                                        <i class="bi bi-cloud-arrow-up"></i>
                                        <input type="file" hidden name="image" accept="image/*" id="thumbnail">
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-lg-4">
                                <label for="location_map_category_id"> Category </label>
                            </div>
                            <div class="col-lg-8">
                                <select id="product_type" name="location_map_category_id" required
                                    class="form-control form-control-sm @error('product_type') is-invalid @enderror">
                                    @foreach ($categories as $category)
                                        <option @if ($location_map->location_map_category_id == $category->id) selected @endif
                                            value="{{ $category->id }}"> {{ $category->name }}
                                        </option>
                                    @endforEach
                                </select>
                                @error('location_map_category_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-lg-4">
                                <label for="name"> Name </label>
                            </div>
                            <div class="col-lg-8">
                                <input id="name" value="{{ $location_map->name }}" type="text" name="name"
                                    autocomplete="location" required class="form-control form-control-sm"
                                    placeholder="Enter Name">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-lg-4">
                                <label for="phone"> Phone </label>
                            </div>
                            <div class="col-lg-8">
                                <input id="name" value="{{ $location_map->phone }}" type="text" name="phone"
                                    autocomplete="phone" required class="form-control form-control-sm"
                                    placeholder="Enter Phone">
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-lg-4">
                                <label for="open_hour">Opening Hour</label>
                            </div>
                            <div class="col-lg-8 row no-gutters">
                                <div class="col-lg-6 col-6">
                                    Open Hour <input type="time" value="{{ $location_map->open_hour }}" required
                                        name="open_hour" class="form-control form-control-sm" id="open_hour">
                                </div>
                                <div class="col-lg-6 col-6 pl-2">
                                    Close Hour <input type="time" value="{{ $location_map->close_hour }}" required
                                        name="close_hour" class="form-control form-control-sm">
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-lg-4">
                                <label for="time_limit">Open Days</label>
                            </div>
                            <div class="col-lg-8">
                                <?php 
                                   $open_days =  explode(',',$location_map->open_days);
                                   $seven_days = [
                                    "Monday", " Tuesday" ," Wednesday", " Thursday", " Friday"," Saturday"," Sunday"
                                   ]
                                ?>
                                @foreach($seven_days as $day)
                                <label for="{{ strtolower($day) }}" class="mr-2">
                                    <input type="checkbox" id="{{ strtolower($day) }}" name="open_days[]" value="{{ $day }}" {{ in_array($day, $open_days) ? 'checked' : '' }}>
                                    {{ $day }}
                                </label>
                                @endforeach
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-lg-4">
                                <label for="address">Address</label>
                            </div>
                            <div class="col-lg-8">
                                <textarea id="address" name="address" required placeholder="Enter Address"
                                    class="form-control @error('address') is-invalid @enderror">{{ $location_map->address }}</textarea>
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mt-1">
                            <label class="col-sm-4 col-form-label">Latitude & Longitude</label>
                            <div class="col-sm-8">
                                <input type="text" name="latitude_longitude"
                                    value="{{ $location_map->latitude }},{{ $location_map->longitude }}," required
                                    placeholder="20.659193, 94.991140"
                                    class="form-control
                                form-control-sm">
                                <small class="form-text text-danger">
                                    Separated By Comma(Latitude,Longitude)
                                </small>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-lg-4">
                                <label for="google_map">Google Map URL</label>
                            </div>
                            <div class="col-lg-8">
                                <textarea name="google_map" id="google_map" class="form-control form-control-sm" placeholder="Enter Google Map">{{ $location_map->google_map }}</textarea>
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
        $(document).ready(function() {
            $('#thumbnail').on('change', function() {
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

@push('child-scripts')
    <script>
        function toggleOperatingHours() {
            $("#other_operating_hours").toggle();
        }
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
