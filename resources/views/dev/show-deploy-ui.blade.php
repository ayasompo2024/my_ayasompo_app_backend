@extends('admin.layout.app')
@section('content')
    <div class="container">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent m-0">
                <li class="breadcrumb-item active p-0" aria-current="page">Deploy</li>
            </ol>
        </nav>
        <div class="bg-light px-md-3  mt-2 mb-5">
            <div class="card p-3">
                <div class="row">
                    <div class="col-md-6">
                        Repo URL
                    </div>
                    <div class="col-md-6">

                    </div>
                    <div class="col-md-6 mt-3">
                        Key
                    </div>
                    <div class="col-md-6 mt-3">

                    </div>
                    <div class="mt-3">
                        <a href="{{ route('dev.backup.database.all') }}" class="btn btn-info btn-sm">
                            Deploy Now
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
