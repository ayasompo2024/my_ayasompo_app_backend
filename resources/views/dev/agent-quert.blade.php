@extends('admin.layout.app')

@section('content')
    <div class=" px-3">
        <h4 class="pt-4">
            Agent Querys <button type="button" class="float-right btn btn-sm btn-danger" data-toggle="modal"
                data-target="#exampleModal">
                Add New Query
            </button>
        </h4>

        <div class="mt-4">
            @foreach ($queries as $query)
                <div class="card">
                    <div class="card-header p-2">
                        {{ $query->key }}
                    </div>
                    <div class="card-body">
                        <p class="card-text">{{ $query->query }}</p>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add New Query</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="{{ route('agent-query.store') }}">
                            @csrf
                            <div>
                                <div>
                                    <span>Key</span>
                                    <input required class="form-control form-control-sm" type="text" name="key">
                                </div>
                                <div class="mt-2">
                                    <span>Query</span>
                                    <textarea required rows="10" name="query" class="form-control form-control-sm"></textarea>
                                </div>
                                <div class="modal-footer">
                                    <input type="submit" class="btn btn-sm btn-danger" value="Add">
                                    <button type="button" class="btn btn-sm btn-secondary"
                                        data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endsection
