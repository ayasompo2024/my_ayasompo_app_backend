@extends('admin.layout.app')
@section('content')
    <div class="container" id="app">
        <nav aria-label="breadcrumb m-0 p-0">
            <ol class="breadcrumb m-0 pl-0 bg-transparent">
                <li class="breadcrumb-item active p-0 pl-1" aria-current="page">Messaging/ Unicast</li>
            </ol>
        </nav>
        <div class="row mx-3 mt-3">
            <div class="col-md-6 offset-md-3 card p-4 broder">
                <form method="post" action="{{ route('admin.messaging.unicast.send') }}">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control" required id="text"
                            placeholder="Title">
                        <small class="form-text text-muted">Required , Min Lenght 3, Max Lenght 255</small>
                    </div>
                    <div class="form-group">
                        <label for="title">Message</label>
                        <textarea name="message" class="form-control" required>
                        </textarea>
                        <small class="form-text text-muted">Option , Max Lenght 255</small>
                    </div>
                    <input type="hidden" value="{{ $c_id }}" name="customer_id">
                    <div>
                        <button type="submit" class="btn btn-sm btn-secondary">
                            <i class="bi bi-send-fill"></i></i> Send
                        </button>
                        <a href="{{ route('admin.messaging.index') }}" class="float-right">
                            <i class="bi bi-broadcast-pin"></i> &nbsp; Broadcast
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
