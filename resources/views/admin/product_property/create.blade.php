@extends('admin.layout.app')
@section('content')
    <div class="container">

        <nav aria-label="breadcrumb m-0 p-0">
            <ol class="breadcrumb m-0 pl-0 bg-transparent">
                <li class="breadcrumb-item active p-0 pl-1" aria-current="page">Product / Property / New</li>
            </ol>
        </nav>

        @include('admin.validation-error-alert')

        <div class="row mt-2">
            <div class="col-md-12 px-md-5 rounded mb-5">
                <h5 class="mt-4 pb-2 border-bottom">
                    <span class="float-right"> Add New Property</span>
                    <a href="{{ url()->previous() }}"><i class="bi bi-arrow-left-square"></i></a>
                </h5>
                <form method="post" action="{{ route('admin.property.store') }}">
                    @csrf

                    <div class="modal-body">
                        <div class="border rounded  p-3">
                            <h5 class="border-bottom mt-0 pt-2">
                                EN
                                <button type="button" onclick="showENGFromToggle()"
                                    class="badge badge-info  border float-right" style="height: 28px">
                                    <i class="bi bi-caret-down"></i>
                                </button>
                            </h5>
                            <div id="showENG" style="display: none">
                                @include('admin.product_property.partials._create_eng_form')
                            </div>
                        </div>
                        <div class="border rounded  p-3 mt-3">
                            <h5 class="border-bottom mt-0 pt-2">
                                MM
                                <button type="button" onclick="showMMFromToggle()"
                                    class="badge badge-info  border float-right" style="height: 28px">
                                    <i class="bi bi-caret-down"></i>
                                </button>
                            </h5>
                            <div id="showMM" style="display: none">
                                @include('admin.product_property.partials._create_mm_form')
                            </div>
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
@push('child-scripts')
    <script>
        function showENGFromToggle() {
            var element = document.getElementById("showENG");

            if (element.style.display === "none") {
                element.style.display = "block";
            } else {
                element.style.display = "none";
            }
        }

        function showMMFromToggle() {
            var element = document.getElementById("showMM");

            if (element.style.display === "none") {
                element.style.display = "block";
            } else {
                element.style.display = "none";
            }
        }
    </script>
@endpush
