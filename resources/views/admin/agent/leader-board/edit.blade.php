@extends('admin.layout.app')
@section('content')
    <div class="container">
        <div class="bg-light px-md-3 mt-md-3 mt-2 mb-5">
            @include('admin.validation-error-alert')
            <div class="row mt-2">
                <div class="col-md-12 px-md-5 rounded mb-5">
                    <h5 class="mt-4 pb-2 border-bottom">
                        <span class="float-right"> Edit LeaderBoard</span>
                        <a href="{{ url()->previous() }}"><i class="bi bi-arrow-left-square"></i></a>
                    </h5>
                    <form class="mt-4" method="POST" action="{{ route('admin.leaderboard.update', $leader->id) }}"
                        enctype="multipart/form-data" onkeydown="return event.key != 'Enter'">
                        @method('put')
                        @csrf
                        <div class="row mt-3">
                            <div class="col-lg-4">
                                <label for="campaign_title"> Campaign Title </label>
                            </div>
                            <div class="col-lg-8">
                                <input id="campaign_title" value="{{ $leader->campaign_title }}" type="text"
                                    name="campaign_title" required class="form-control form-control-sm"
                                    placeholder="Enter title">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-lg-4">
                                <label for="product_code"> Product Code </label>
                            </div>
                            <div class="col-lg-8">
                                <input id="product_code" value="{{ $leader->product_code }}" type="text"
                                    name="product_code" required class="form-control form-control-sm"
                                    placeholder="Enter title">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-lg-4">
                                <label for="period_from"> Period From </label>
                            </div>
                            <div class="col-lg-8">
                                <input id="period_from" value="{{ $leader->period_from }}" type="text" name="period_from"
                                    required class="form-control form-control-sm"
                                    placeholder="foramt must be 2024-01-01">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-lg-4">
                                <label for="period_to"> Period To </label>
                            </div>
                            <div class="col-lg-8">
                                <input id="period_to" value="{{ $leader->period_to }}" type="text" name="period_to"
                                    required class="form-control form-control-sm"
                                    placeholder="foramt must be 2024-01-01">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-lg-4">
                                <label for="name"> Agent Name </label>
                            </div>
                            <div class="col-lg-8">
                                <input id="title" value="{{ $leader->name }}" type="text" name="name" required"
                                    class="form-control form-control-sm" placeholder="Enter title">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-lg-4">
                                <label for="points"> Point </label>
                            </div>
                            <div class="col-lg-8">
                                <input id="points" value="{{ $leader->points }}" type="text" name="points" required
                                    class="form-control form-control-sm" placeholder="Enter Point">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-lg-4">
                                <label for="phone"> Phone </label>
                            </div>
                            <div class="col-lg-8">
                                <input id="phone" value="{{ $leader->phone }}" type="text" name="phone" required
                                    class="form-control form-control-sm" placeholder="Enter Phone">
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
