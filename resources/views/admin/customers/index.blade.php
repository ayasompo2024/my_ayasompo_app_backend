@extends('admin.layout.app')
@section('content')
    <div class="container bg-white" id="app">
        <nav class="pt-3 pl-3">
            Customer / All
            <span class="badge bg-info ml-2">{{ $customers->total() }}</span>
            <div class="float-right">
                <form action="{{ route('admin.customer.search.by-phone') }}" method="get">
                    <div class="input-group mb-2 mr-sm-2">
                        <input type="text" name="phone" required class="form-control form-control-sm"
                            placeholder="Phone,Name,Policy,Code">
                        <div class="input-group-prepend" style="background:#ce123c">
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
                <a v-if="!showSelectBoxCondition" @click="showSelectBox(true)" class="btn btn-sm  text-white mr-2"
                    style="background:#ce123c">
                    <i class="bi bi-bell-fill"></i> Select to send noti
                </a>
                @include('admin.customers._navi')
                <div class="d-inline float-right">
                    <div style="display:inline">
                        <form method="get" action={{ route('admin.customer1.import') }} style="display:inline">
                            <button class="btn btn-sm text-white mr-2" style="background:#ce123c">Import</button>
                        </form>
                    </div>
                    <form style="display:inline">
                        <select style="display:inline" class="btn border">
                            <option>Active</option>
                            <option>Disabled</option>
                        </select>
                    </form>
                </div>
            </div>
        </nav>
        @include('admin.validation-error-alert')
        <div class="bg-white  px-md-3  mb-5 pt-3 mt-3">
            <table class="table table-responsive" style="min-height: 300px">
                <thead>
                    <tr>
                        <th v-if="showSelectBoxCondition" class="p-2">Select</th>
                        <th class="p-2" style="min-width: 180px">Created At</th>
                        <th class="p-2" style="min-width: 140px">Code</th>
                        <th class="p-2" style="min-width: 200px">App User Name</th>
                        <th class="p-2" style="min-width: 140px">Customer Phone</th>
                        <th class="p-2" style="min-width: 180px">App Customer Type</th>
                        <th class="p-2" style="min-width: 180px">Policy Number</th>
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
                        <td class="p-1">
                            <span v-if="isToday(customer.created_at)" v-text="Today" class="badge bg-success mr-2"></span>
                            <span v-text="formatDateTime(customer.created_at)"></span>
                        </td>
                        <td class="p-1">
                            <span v-if='customer.app_customer_type == "EMPLOYEE"'>
                                <span v-text="customer.employee_info ? customer.employee_info.code : ''"></span>
                            </span>
                            <span v-if='customer.app_customer_type != "EMPLOYEE"'>
                                <span v-text="customer.core ? customer.core.customer_code : customer.customer_code "></span>
                            </span>
                        </td>
                        <td :title="customer.core ? customer.core.customer_name : ''" class="p-2">
                            <img :src="customer.profile_photo" width="25px" style="object-fit: cover;aspect-ratio:1/1">
                            &nbsp; <span v-text="customer ? customer.user_name : ''"></span>
                        </td>
                        <td class="p-1" :title="customer.id" v-text="customer.customer_phoneno"></td>
                        <td class="p-1" v-text="customer.app_customer_type"> </td>
                        <td class="p-1" v-text="customer.policy_number"> </td>
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
                                            <a :href="'/admin/messaging/unicast/show-form/' + customer.id"
                                                class="btn btn-sm">
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
                                            <form :action="'/admin/customer/disabled/toggle/' + customer.id"
                                                method="post">
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
                                            <form :action="'/admin/customer/' + customer.id" method="post">
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
                                        <li
                                            class="list-group-item d-flex justify-content-between align-items-center border-0 py-1 px-2 ">
                                            <a :href="'/admin/customer/' + customer.id + '/edit'" class="btn btn-sm">
                                                Edit
                                            </a>
                                            <i class="bi bi-pencil-square mr-2"></i>
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
                console.log(customers);
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
                },
                isToday(dateTime) {
                    const now = new Date();
                    const logDate = new Date(dateTime);
                    return now.toDateString() === logDate.toDateString();
                },
                formatDateTime(dateTime) {
                    const logDate = new Date(dateTime);
                    const options = {
                        hour: '2-digit',
                        minute: '2-digit',
                        second: '2-digit'
                    };
                    if (this.isToday(dateTime)) {
                        return logDate.toLocaleTimeString('en-US', options);
                    } else {
                        return logDate.toLocaleString('en-US', {
                            year: 'numeric',
                            month: '2-digit',
                            day: '2-digit'
                        }) + ' ' + logDate.toLocaleTimeString('en-US', options);
                    }
                }
            }
        });
        app.mount('#app');
    </script>
@endpush
