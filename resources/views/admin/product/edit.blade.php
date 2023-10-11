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
            <form class="mt-4" method="POST" action="{{ route('admin.product.update',$product->id) }}" enctype="multipart/form-data"
                onkeydown="return event.key != 'Enter'">
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
                                        "<div class='upload__img-box'><div style='background-image: url("+
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