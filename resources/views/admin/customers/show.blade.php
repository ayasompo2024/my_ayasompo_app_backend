@extends('admin.layout.app')
@section('content')
<div class="container">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb m-0 pl-3 bg-transparent">
            <li class="breadcrumb-item active p-0" aria-current="page">Customers / {{$customer->name}}
            </li>
        </ol>
    </nav>

    <a class="btn btn-secondary btn-sm  px-2 ml-md-3" href="{{ url()->previous() }}">
        <i class="bi bi-arrow-left-square text-white"></i>
    </a>

    <div class="bg-light px-md-3  mb-5 mt-2">
        <div class="bg-white px-3">
            <ul class="list-group list-group-flush">
                <li class="list-group-item list-group-item-action">
                    Name : {{$customer->name}}
                </li>
                <li class="list-group-item list-group-item-action">
                    Date Of Birth : {{$customer->date_of_birth}}
                </li>
                <li class="list-group-item list-group-item-action">
                    Gender : {{$customer->gender}}
                </li>
                <li class="list-group-item list-group-item-action">
                    Created at : {{$customer->created_at->diffForHumans()}}
                </li>
            </ul>
        </div>
    </div>
    s

</div>

@endsection