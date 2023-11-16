@extends('admin.layout.app')
@section('content')
    <div class="container">

        <nav class="pt-3 pl-3">
            Customer / All
            <span class="badge bg-info ml-2">{{ $customers->total() }}</span>
            <div class="float-right">
                <a class="btn btn-sm btn-secondary" data-toggle="modal" data-target="#new">
                    <i class="bi bi-plus-square pr-2"></i> Group User Add
                </a>
            </div>
        </nav>

        @include('admin.validation-error-alert')

        <div class="bg-light px-md-3 mt-2 mb-5 pt-3">
            <table class="table table-responsive">
                <thead>
                    <tr>
                        <th style="min-width: 140px">Customer Code</th>
                        <th style="min-width: 130px">Customer Type</th>
                        <th style="min-width: 150px">Customer Name</th>
                        <th style="min-width: 200px">App User Name</th>
                        <th style="min-width: 140px">Customer Phone</th>
                        <th style="min-width: 140px">NRC</th>
                        <th>Email</th>
                        <th style="min-width: 150px">created_at</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($customers as $customer)
                        <tr style="font-size: 15px">
                            <td class="p-2"> {{ $customer->customer_code }} </td>
                            <td class="p-2">{{ $customer->core->customer_type }}</td>
                            <td class="p-2"> {{ $customer->core->customer_name }} </td>
                            <td class="p-2"> {{ $customer->user_name }} </td>
                            <td class="p-2"> {{ $customer->customer_phoneno }} </td>
                            <td class="p-2"> {{ $customer->core->customer_nrc }} </td>
                            <td class="p-2"> {{ $customer->core->email }} </td>
                            <td class="p-2"> {{ $customer->created_at->diffForHumans() }} </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="float-right pb-3">
            <p class="">
                {!! $customers->links('pagination::bootstrap-4') !!}
            </p>
        </div>

        <div class="modal fade" id="new" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <form action="{{ route('admin.customer.get-customers-list-by-policy') }}" method="post">
                        @csrf
                        <div class="modal-header p-2">
                            <h5 class="modal-title" id="exampleModalLongTitle">New Customer</h5>
                            <button type="button" class="close" data-dismiss="modal">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body px-3 py-2">
                            <div class="form-group">
                                <label for="policy_no">Enter Policy Number</label>
                                <input name="policy_no" type="text" class="form-control form-control-sm" required id="policy_no"
                                    placeholder="Enter Policy Number">
                            </div>
                        </div>
                        <div class="modal-footer p-2">
                            <button type="submit" class="btn btn-sm btn-secondary">
                                Next
                                <i class="bi bi-arrow-right-circle-fill ml-1"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
