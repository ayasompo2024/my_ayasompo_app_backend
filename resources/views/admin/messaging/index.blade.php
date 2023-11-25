@extends('admin.layout.app')
@section('content')
    <div class="container" id="app">
        <nav aria-label="breadcrumb m-0 p-0">
            <ol class="breadcrumb m-0 pl-0 bg-transparent">
                <li class="breadcrumb-item active p-0 pl-1" aria-current="page">Product / All</li>
            </ol>
        </nav>
        <div class="row mx-3 mt-3">
            <div class="col-md-6 offset-md-3 card p-4 broder">
                <form>
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" required id="text" placeholder="Title">
                        <small class="form-text text-muted">Required , Min Lenght 3, Max Lenght 255</small>
                    </div>
                    <div class="form-group">
                        <label for="title">Message</label>
                        <textarea class="form-control">
                        </textarea>
                        <small class="form-text text-muted">Option , Max Lenght 255</small>
                    </div>
                </form>
                <div>
                    <a @click="selectedMessagingType("Broadcast")" class="btn btn-sm btn-secondary" data-toggle="modal"
                        data-target="#new">
                        <i class="bi bi-broadcast-pin"></i> &nbsp; Broadcast
                    </a>
                    <a class="float-right " href="{{ route('admin.customer.index') }}">
                        Unicast &nbsp; <i class="bi bi-arrow-right-circle"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('child-scripts')
@endpush
