@extends('admin.layout.app')
@section('content')
    <div class="container">
        <nav class="pt-3 pl-3">
            Customer / All
            <span class="badge bg-info ml-2">{{ $customers->total() }}</span>
            <div class="float-right">
                <form action="{{ route('admin.customer.search.by-phone') }}" method="get">
                    <div class="input-group mb-2 mr-sm-2">
                        <input type="number" name="phone" required class="form-control form-control-sm" placeholder="Phone">
                        <div class="input-group-prepend bg-secondary">
                            <button type="submit" class="btn btn-sm text-white"><i class="bi bi-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="float-right mr-2">
                <a class="btn btn-sm btn-secondary" data-toggle="modal" data-target="#new">
                    <i class="bi bi-plus-square pr-2"></i> Group User Add
                </a>
            </div>
        </nav>
        @include('admin.validation-error-alert')
        <div class="bg-light px-md-3 mt-2 mb-5 pt-3 mt-2">
            <table class="table table-responsive-sm">
                <thead>
                    <tr>
                        <th style="min-width: 140px">Customer Code</th>
                        <th style="min-width: 200px">App User Name</th>
                        <th style="min-width: 140px">Customer Phone</th>
                        <th style="min-width: 180px">App Customer Type</th>
                        <th style="min-width: 180px">Disabled Status</th>
                        <th style="min-width: 250px">Operating </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($customers as $customer)
                        <tr style="font-size: 15px">
                            <td class="p-2"> {{ $customer->customer_code }} </td>
                            <td title="{{ $customer->core->customer_name }}" class="p-2"> {{ $customer->user_name }}
                            </td>
                            <td class="p-2"> {{ $customer->customer_phoneno }} </td>
                            <td class="p-2"> {{ $customer->app_customer_type }} </td>
                            <td class="p-2">
                                @if ($customer->is_disabled == 1)
                                    <span class="badge bg-warning">
                                        Disabled <i class="bi bi-x-circle-fill"></i>
                                    </span>
                                @else
                                    <span class="badge bg-info">
                                        Active <i class="bi bi-activity"></i>
                                    </span>
                                @endif
                            </td>

                            <td class="p-2">
                                <div class="dropdown show">
                                    <a class="btn btn-sm btn-light dropdown-toggle" href="#" role="button"
                                        id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        <i class="bi bi-three-dots-vertical"></i>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <ul class="list-group border-0">
                                            <li
                                                class="list-group-item d-flex justify-content-between align-items-center border-0 py-1 px-2 ">
                                                <a href="{{ route('admin.messaging.unicast.show-form', $customer->id) }}"
                                                    class="btn btn-sm ">
                                                    Send Noti
                                                </a>
                                                <i class="bi bi-bell-fill"></i>
                                            </li>
                                            <li
                                                class="list-group-item d-flex justify-content-between align-items-center border-0 py-1 px-2 ">
                                                <a href="{{ route('admin.messaging.unicast.show-form', $customer->id) }}"
                                                    class="btn btn-sm">
                                                    See Noti Histroy
                                                </a>
                                                <i class="bi bi-clock-history"></i>
                                            </li>
                                            <li
                                                class="list-group-item d-flex justify-content-between align-items-center border-0  py-1 px-2 ">
                                                <form action="{{ route('admin.customer.disabled.toggle', $customer->id) }}"
                                                    method="post">
                                                    @csrf
                                                    @if ($customer->is_disabled == 1)
                                                        <form
                                                            action="{{ route('admin.customer.disabled.toggle', $customer->id) }}"
                                                            method="post">
                                                            @csrf
                                                            <div>
                                                                <button type="submit" class="btn btn-sm px-0 ml-2">
                                                                    Make Disabled
                                                                </button>
                                                            </div>
                                                        </form>
                                                        <i class="bi bi-activity"></i>
                                                    @else
                                                        <form
                                                            action="{{ route('admin.customer.disabled.toggle', $customer->id) }}"
                                                            method="post">
                                                            @csrf
                                                            <div>
                                                                <button type="submit" class="btn btn-sm px-0 ml-2">
                                                                    Make Disabled
                                                                </button>
                                                            </div>
                                                        </form>
                                                        <i class="bi bi-x-circle-fill"></i>
                                                    @endif
                                                </form>
                                            </li>
                                            <li
                                                class="list-group-item d-flex justify-content-between align-items-center border-0 py-1 px-2 ">
                                                <form action="{{ route('admin.customer.destroy', $customer->id) }}"
                                                    method="post">
                                                    @method('delete') 
                                                    @csrf
                                                    <div>
                                                        <button type="submit" class="btn btn-sm px-0 ml-2">
                                                            Delete
                                                        </button>
                                                    </div>
                                                </form>
                                                <i class="bi bi-trash-fill"></i>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </td>
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
                                <input name="policy_no" type="text" class="form-control form-control-sm" required
                                    id="policy_no" placeholder="AYA/YGN/MCP/791289241">
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
