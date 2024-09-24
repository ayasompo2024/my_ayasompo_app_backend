@extends('admin.layout.app')
@section('content')
<div class="container bg-white" id="app">
    <div class="row">
        <div class="col-12">
            <h4> {{ $type }} </h4>
        </div>

        @if($type !== "INDIVIDUAL")
            <div class="col-12 mt-3">
                @include('admin.customers._navi')
            </div>
        @endif

    </div>

    <div id="customer-count"></div>
    <div id="customer-list"></div>
</div>
@endsection


