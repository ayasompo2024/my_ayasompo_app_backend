@extends('admin.layout.app')
@section('content')
<div class="container">

    <nav aria-label="breadcrumb m-0 p-0">
        <ol class="breadcrumb m-0 pl-0 bg-transparent">
            <li class="breadcrumb-item active p-0 pl-3" aria-current="page">Customer / All</li>
        </ol>
    </nav>
    @include('admin.validation-error-alert')

    


    <div class="bg-light px-md-3 mt-2 mb-5">
        <table class="table table-responsives">
            <thead>
                <tr>
                    <th style="min-width: 200px">Name</th>
                    <th style="min-width: 250px">Phone</th>
                    <th style="min-width: 200px">Gender</th>
                    <th style="min-width: 200px">Date</th>
                    <th>Detail</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($customers as $customer )
                <tr>
                    <td> {{ $customer->name }} </td>
                    <td class="tw-relative">{{ $customer->phone }}</td>
                    <td> {{ $customer->gender }} </td>
                    <td> {{ $customer->date_of_birth}} </td>
                    <td> {{ $customer->created_at->diffForHumans() }} </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="float-right pb-3">
        <p class="">
            {!!$customers->links('pagination::bootstrap-4')!!}
        </p>
    </div>
    {{-- driver modal--}}
    <div class="modal fade" id="new_customer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="post" action="{{ route('admin.customer.store') }}">
                    @csrf
                    @include('admin.customers._customer_form')
                </form>
            </div>
        </div>
    </div>

</div>

@endsection