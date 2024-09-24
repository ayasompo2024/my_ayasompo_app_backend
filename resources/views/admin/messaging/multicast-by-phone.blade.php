@extends('admin.layout.app')
@section('content')
    <div class="container bg-light">
        <nav aria-label="breadcrumb m-0 p-0">
            <ol class="breadcrumb m-0 pl-0 bg-transparent">
                <li class="breadcrumb-item active p-0 pl-4" aria-current="page">Message / Send </li>
            </ol>
        </nav>
        {{--09787796698,123456789,09791289241, --}}
        <div class="card shadow-none mx-md-4 px-3 pb-4 pt-2">
            <form action="{{ route('admin.messaging.multicast.by-phones.send') }}" enctype="multipart/form-data" method="post"
                id="multicastForm">
                @csrf
                <h6 class="border-bottom pb-2">
                    <b>Multicast</b>
                    <i class="float-right bi bi-bell-fill"></i>
                </h6>

                <input type="hidden" value="{{ \App\Enums\NotiFor::TRANSACTION->value }}" name="noti_for">
                <div class="row mt-4">
                    <label class="col-md-4" for="title">Phones*</label>
                    <div class="col-md-8" id="app">
                        <input v-model="phone" v-focus-next type="text" class="form-control form-control-sm"
                            name="title"  placeholder="123456789,09791289241,4044484402">
                        <div style="display:flex; gap: 0px 4px;  flex-wrap: wrap;">
                            <span class="badge mt-1 bg-info" v-for="(phone, index) in phones" :key="index">
                                <span v-text="phone"></span>
                                <i @click="deletePhone(index)" class="ml-2 bi bi-x-circle-fill"></i>
                            </span>
                        </div>
                        <input name="phonesString" :value="phones" type="text"
                            class="form-control mt-2 form-control-sm" name="title" required placeholder="Title">
                    </div>
                </div>
                <div class="row mt-4">
                    <label class="col-md-4" for="title">Title*</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control form-control-sm" v-focus-next name="title" required
                            placeholder="Title">
                        <small class="form-text text-muted">Required , Min Lenght 3, Max Lenght 255</small>
                    </div>
                </div>
                <div class="row mt-3">
                    <label class="col-md-4" for="message">Message</label>
                    <div class="col-md-8">
                        <textarea name="message" required v-focus-next class="form-control"></textarea>
                        <small class="form-text text-muted">Option , Max Lenght 255</small>
                    </div>
                </div>
                <div class="row mt-3">
                    <label class="col-md-4">Photo</label>
                    <div class="col-md-8">
                        <div class="upload__box">
                            <div class="upload__img-wrap"></div>
                            <div class="upload__btn-box">
                                <label class="btn btn-sm shadow-sm bg-secondary">
                                    <i class="bi bi-image"></i> Add Photo
                                    <input type="file" type="hidden" name="image" data-max_length="1" accept="image/*"
                                        class="upload__inputfile">
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <label class="col-md-4" for="description">Description</label>
                    <div class="col-md-8">
                        <textarea id="editorForProperty" v-focus-next rows="5" style="white-space: pre-wrap;" name="description"
                            class="form-control form-control-sm" placeholder="Enter Descriptione" id="description" /></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-8">
                        <button type="submit" class="btn btn-sm btn-secondary" data-toggle="modal" data-target="#new">
                            <i class="bi bi-broadcast-pin"></i> &nbsp; Send
                        </button>
                    </div>
                </div>
            </form>
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
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('multicastForm').addEventListener('keydown', function(event) {
                if (event.key === 'Enter' || event.key === 'Tab') {
                    event.preventDefault();
                    const activeElement = document.activeElement;
                    if (activeElement.tagName === 'INPUT' || activeElement.tagName === 'TEXTAREA') {
                        activeElement.blur();
                    }
                }
            });
        });
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

@push('child-scripts')
    <script>
        const app = SpideyShine.createApp({
            data() {
                return {
                    phones: [],
                    phone: ''
                };
            },
            methods: {
                deletePhone(index) {
                    this.phones.splice(index, 1);
                },
                truncateContent(name) {
                    if (!name || name.length === 0) {
                        return "";
                    }
                    let truncatedName = name.substring(7);
                    return truncatedName.length > 10 ? truncatedName.substring(0, 10) + '...' : truncatedName;
                },
            },
            watch: {
                phone(newValue, oldValue) {
                    if (newValue.includes(',')) {
                        let phonesString = newValue.split(',');
                        phonesString.forEach(phone => {
                            let trimmedPart = phone.trim();
                            if (trimmedPart !== '' && trimmedPart.length < 12) {
                                if (!this.phones.includes(trimmedPart)) {
                                    this.phones.push(trimmedPart);
                                }
                                this.phone = '';
                            }
                        });
                    }
                }
            }

        });
        app.mount('#app');
    </script>
@endpush
