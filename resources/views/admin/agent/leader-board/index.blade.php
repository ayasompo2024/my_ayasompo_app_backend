@extends('admin.layout.app')
@section('content')
    <div class="container">
        <nav aria-label="breadcrumb m-0 p-0">
            <ol class="breadcrumb m-0 pl-0 bg-transparent">
                <li class="breadcrumb-item active p-0 pl-1" aria-current="page">LeaderBoard </li>
            </ol>
        </nav>
        <a href="#" class="btn btn-sm btn-danger">
            <i class="bi bi-plus-square pr-2"></i> 
        </a>
        @include('admin.validation-error-alert')
        <div class="mt-3 mb-5">

        </div>
    </div>
@endsection
