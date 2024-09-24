@extends('admin.layout.app')
@section('content')
    <div class="container">
        <nav aria-label="breadcrumb m-0 p-0">
            <ol class="breadcrumb m-0 pl-0 bg-transparent">
                <li class="breadcrumb-item active p-0 pl-3" aria-current="page">Customer / {{ $customer->user_name }} / Edit
                </li>
            </ol>
        </nav>
        @include('admin.validation-error-alert')
        <div class=" mx-3 card">
            <div class="row mt-2">
                <div class="col-md-12 px-md-5 rounded mb-5">
                    <h5 class="mt-4 pb-2 border-bottom">
                        <span class="float-right"> Edit </span>
                        <a href="{{ url()->previous() }}"><i class="bi bi-arrow-left-square"></i></a>
                    </h5>
                    <form class="mt-4" method="post" action="{{ route('admin.customer.update', $customer->id) }}"
                        enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="row mt-3">
                            <div class="col-lg-4"><label class="font-weight-normal" for="description">Avatar</label></div>
                            <div class="col-lg-8" style="position: relative">
                                <div class="card old-photo"
                                    style="width: 200px;height: 200px;background-size: cover; background-image: url({{ $customer->profile_photo }})">
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
                                        <input type="file" hidden name="profile_photo" accept="image/*" id="thumbnail">
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-lg-4">
                                <label for="customer_phoneno" style="font-weight: normal"> Phone Number </label>
                            </div>
                            <div class="col-lg-8">
                                <input value="{{ $customer->customer_phoneno }}" type="number" name="customer_phoneno"
                                    required class="form-control form-control-sm" placeholder="Enter Phone "
                                    id="customer_phoneno">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-lg-4">
                                <label for="user_name" style="font-weight: normal"> User Name </label>
                            </div>
                            <div class="col-lg-8">
                                <input value="{{ $customer->user_name }}" type="text" name="user_name" required
                                    class="form-control form-control-sm" placeholder="Enter User Name" id="user_name">
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
