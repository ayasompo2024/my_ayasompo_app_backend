@extends('admin.layout.app')
@section('content')
    <div class="container bg-white" id="app">
        <nav class="pt-3 pl-3">
            Customer / All
            <span class="badge bg-info ml-2">{{ $customers->total() }}</span>
            <div class="float-right">
                <form action="{{ route('admin.customer.search.by-phone') }}" method="get">
                    <div class="input-group mb-2 mr-sm-2">
                        <input type="number" name="phone" required class="form-control form-control-sm"
                            placeholder="Phone">
                        <div class="input-group-prepend bg-secondary">
                            <button type="submit" class="btn btn-sm text-white"><i class="bi bi-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="mr-2 mt-3">
                <a v-if="showSelectBoxCondition" :href="'/admin/messaging/multicast/show-form/' + selectedCustomerId"
                    class="btn btn-sm btn-secondary mr-2">
                    <i class="bi bi-bell-fill"></i> Send Now </span>
                </a>
                <a v-if="showSelectBoxCondition" @click="showSelectBox(false)"
                    class="btn btn-sm btn-outline-secondary mr-2">
                    <i class="bi bi-x-circle"></i> Cancel
                </a>
                <a v-if="!showSelectBoxCondition" @click="showSelectBox(true)" class="btn btn-sm btn-secondary mr-2">
                    <i class="bi bi-bell-fill"></i> Select to send noti
                </a>
                <a class="btn btn-sm btn-secondary" data-toggle="modal" data-target="#new">
                    <i class="bi bi-plus-square pr-2"></i> Group User Add
                </a>
                <a class="btn btn-sm btn-secondary mx-2" data-toggle="modal" data-target="#AddEmployeeUser">
                    <i class="bi bi-plus-square pr-2"></i> Add Employee User
                </a>
            </div>
        </nav>
        @include('admin.validation-error-alert')
        <div class="bg-white px-md-3  mb-5 pt-2">
            <table class="table table-responsive " style="min-height: 300px">
                <thead>
                    <tr>
                        <th v-if="showSelectBoxCondition" class="p-2">Select</th>
                        <th class="p-2" style="min-width: 140px">Customer Code</th>
                        <th class="p-2" style="min-width: 200px">App User Name</th>
                        <th class="p-2" style="min-width: 140px">Customer Phone</th>
                        <th class="p-2" style="min-width: 180px">App Customer Type</th>
                        <th class="p-2" style="min-width: 180px">Disabled Status</th>
                        <th class="p-2">Operating </th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(customer, key) in customers" style="font-size: 15px">
                        <td v-if="showSelectBoxCondition" class="p-1" style="cursor: pointer">
                            <span v-bind:class="{ 'rounded p-1  bg-danger': checkAlreadExist(customer.id) }"
                                @click="selectCustomerId(customer.id, $event)">
                                <i class="bi bi-check-circle"></i>
                            </span>
                        </td>
                        <td class="p-1" v-text="customer.customer_code"></td>
                        <td :title="customer.core.customer_name" v-text="customer.user_name" class="p-2">
                        </td>
                        <td class="p-1" v-text="customer.customer_phoneno + ' - ' + customer.id"></td>
                        <td class="p-1" v-text="customer.app_customer_type"> </td>
                        <td class="p-1">
                            <span v-if="customer.is_disabled == 1" class="badge bg-warning">
                                Disabled <i class="bi bi-x-circle-fill"></i>
                            </span>
                            <span v-else class="badge bg-info">
                                Active <i class="bi bi-activity"></i>
                            </span>
                        </td>
                        <td class="p-1">
                            <div class="dropdown show">
                                <a class="btn btn-sm btn-light dropdown-toggle py-0" href="#" role="button"
                                    id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="bi bi-three-dots-vertical"></i>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <ul class="list-group border-0">
                                        <li
                                            class="list-group-item d-flex justify-content-between align-items-center border-0 py-1 px-2 ">
                                            <a :href="'messaging/unicast/show-form/' + customer.id" class="btn btn-sm">
                                                Send Noti
                                            </a>
                                            <i class="bi bi-bell-fill mr-2"></i>
                                        </li>
                                        <li
                                            class="list-group-item d-flex justify-content-between align-items-center border-0 py-1 px-2 ">
                                            <a :href="'/admin/messaging/history/get-by-customer-id/' + customer.id"
                                                class="btn btn-sm">
                                                See Noti Histroy
                                            </a>
                                            <i class="bi bi-clock-history mr-2"></i>
                                        </li>
                                        <li
                                            class="list-group-item d-flex justify-content-between align-items-center border-0  py-1 px-2 ">
                                            <form :action="'customer/disabled/toggle/' + customer.id" method="post">
                                                @csrf
                                                <div v-if="customer.is_disabled == 1" class="d-flex">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm px-0 ml-2">
                                                        Make Active
                                                    </button>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i
                                                        class="bi bi-activity float-right"></i>
                                                </div>
                                                <div v-if="customer.is_disabled == 0" class="d-flex">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm px-0 ml-2">
                                                        Make Disabled
                                                    </button>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i
                                                        class="bi bi-x-circle-fill float-right"></i>
                                                </div>
                                            </form>
                                        </li>
                                        <li
                                            class="list-group-item d-flex justify-content-between align-items-center border-0 py-1 px-2 ">
                                            <form :action="'customer/' + customer.id" method="post">
                                                @method('delete')
                                                @csrf
                                                <div>
                                                    <button type="submit" class="btn btn-sm px-0 ml-2">
                                                        Delete
                                                    </button>
                                                </div>
                                            </form>
                                            <i class="bi bi-trash-fill mr-2"></i>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </td>
                    </tr>
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
        <div class="modal fade" id="AddEmployeeUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <form action="{{ route('admin.customer.new.employee') }}" method="post" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-header p-2">
                            <h5 class="modal-title" id="exampleModalLongTitle">Add Employee User</h5>
                            <button type="button" class="close" data-dismiss="modal">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body px-3 py-2">
                            <div class="form-group">
                                <label>Select File </label>
                                <input name="add_employee_user_file" type="file" class="form-control" accept=".xls, .xlsx" required>
                            </div>
                        </div>
                        <div class="modal-footer p-2">
                            <button type="submit" class="btn btn-sm btn-secondary">
                                Register
                                <i class="bi bi-arrow-right-circle-fill ml-1"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('child-scripts')
    <script>
        const app = SpideyShine.createApp({
            mounted() {
                window.addEventListener('beforeunload', this.handleBeforeUnload);
            },
            data() {
                const customers = @json($customers->items());
                const storedOldSelectedCustomerId = localStorage.getItem("oldSelectedCustomerId");
                let selectedCustomerId = storedOldSelectedCustomerId ? JSON.parse(storedOldSelectedCustomerId) : [];
                const showSelectBoxCondition = selectedCustomerId.length > 0 ? true : false;

                return {
                    customers,
                    showSelectBoxCondition,
                    selectedCustomerId
                };
            },
            methods: {
                checkAlreadExist(customerId) {
                    return this.selectedCustomerId.includes(customerId);
                },
                showSelectBox(condition) {
                    if (!condition) {
                        this.selectedCustomerId = [];
                        localStorage.removeItem("oldSelectedCustomerId");
                    }
                    this.showSelectBoxCondition = condition
                },
                selectCustomerId(customerId, event) {
                    if (this.selectedCustomerId.includes(customerId)) {
                        event.target.classList.remove('bg-danger');
                        this.selectedCustomerId.splice(this.selectedCustomerId.findIndex(id => id == customerId),
                            1);
                    } else {
                        event.target.classList.add('bg-danger');
                        this.selectedCustomerId.push(customerId)
                    }
                },
                handleBeforeUnload(event) {
                    localStorage.setItem("oldSelectedCustomerId", JSON.stringify(this.selectedCustomerId));
                }
            }
        });
        app.mount('#app');
    </script>
@endpush
