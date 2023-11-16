@extends('admin.layout.app')
@section('content')
    <div class="container" id="app">
        <nav class="pt-3 pl-3">
            Customer / New Group User
        </nav>

        <div v-if="getPolicyListPanddingStatus">
            <span class="loader"></span>
        </div>

        <div v-if="getPolicyListErrorStatus">
            <section class="text-center py-5">
                <div class="row mt-5">
                    <div class="col-lg-6 mx-auto">
                        <h3 class="ml-4"
                            style="text-shadow: 2px 2px 0 #fff, 3px 3px 0 #eaecf7;position: relative;top:28px">
                            Error
                            <br>
                            <small>Status Code </small>
                        </h3>
                    </div>
                </div>
            </section>
        </div>

        <div v-if="policyList" class="row mt-3">
            <div class="col-md-8 offset-md-2 p-2 bg-white">
                <div class="card-body rounded hover-scale" style="background: #CDCDCD">
                    <div class="d-flex">
                        <div style="width: 50%">
                            <i class="bi bi-person-circle mr-2"></i> Customer Code
                        </div>
                        <div style="width: 50%">
                            <input class="form-control form-control-sm" :value="selectCustomerObj.customer_code"
                                type="text" readonly>
                        </div>
                    </div>
                    <div class="d-flex">
                        <div style="width: 50%">
                            <i class="bi bi-front mr-2"></i> Customer Type
                        </div>
                        <div style="width: 50%">
                            <input class="form-control form-control-sm" :value="selectCustomerObj.customer_type"
                                type="text" readonly>
                        </div>
                    </div>
                    <div class="d-flex">
                        <div style="width: 50%">
                            <i class="bi bi-credit-card-2-front mr-2"></i> Customer NRC
                        </div>
                        <div style="width: 50%">
                            <input class="form-control form-control-sm" :value="selectCustomerObj.customer_nrc"
                                type="text" readonly>
                        </div>
                    </div>

                    <div class="d-flex">
                        <div style="width: 50%">
                            <i class="bi bi-telephone mr-2"></i> Customer Phone No
                        </div>
                        <div style="width: 50%">
                            <input class="form-control form-control-sm" :value="selectCustomerObj.customer_phoneno"
                                type="text" readonly>
                        </div>
                    </div>
                    <div class="d-flex">
                        <div style="width: 50%">
                            <i class="bi bi-123 mr-2"></i> Policy Number
                        </div>
                        <div style="width: 50%">
                            <input class="form-control form-control-sm" :value="policyList.policyNumber" type="text"
                                readonly>
                        </div>
                    </div>
                    <div class="d-flex mt-1">
                        <div style="width: 50%">
                            <i class="bi bi-calendar-date mr-2"></i> Policy Date (Start - End)
                        </div>
                        <div style="width: 50%" class="d-flex">
                            <input class="form-control form-control-sm" :value="policyList.policyStartDate" type="text"
                                readonly>
                            <span class="mx-2"> - </span>
                            <input class="form-control form-control-sm" :value="policyList.policyEndDate" type="text"
                                readonly>
                        </div>
                    </div>
                    <div class="d-flex mt-1">
                        <div style="width: 50%">
                            <i class="bi bi-calendar-date mr-2"></i> Is Expiring
                        </div>
                        <div style="width: 50%">
                            <input v-if="policyList.isExpiring == null" class="form-control form-control-sm" value="Nan"
                                type="text" readonly>
                            <input v-else="policyList.isExpiring == null" class="form-control form-control-sm"
                                :value="policyList.isExpiring" type="text" readonly>
                        </div>
                    </div>
                    <div class="d-flex mt-1">
                        <div style="width: 50%">
                            <i class="bi bi-activity mr-2"></i> Policy Status
                        </div>
                        <div style="width: 50%">
                            <input class="form-control form-control-sm" :value="policyList.policyStatus" type="text"
                                readonly>
                        </div>
                    </div>
                    <div class="mt-1">
                        <div class="d-flex">
                            <div style="width: 50%">
                                <i class="bi bi-telephone mr-2"></i> Enter Phones to Register
                            </div>
                            <div style="width: 50%">
                                <ul class="list-group list-group-flush">
                                    <li v-for="(phone, key) in phoneNumberArray"
                                        class="list-group-item p-0 m-0 bg-light rounded mt-1">
                                        <span class="ml-1">@{{ phone }}</span>
                                        <button @click="removePhone(key)" class="btn btn-sm  float-right"><i
                                                class="bi bi-x-circle-fill text-danger"></i></button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="mt-1">
                        <div class="d-flex">
                            <div style="width: 50%">

                            </div>
                            <div style="width: 50%" class="d-flex">
                                <input type="text" value="+959" style="width: 50px;"
                                    class="form-control form-control-sm" />
                                <input class="form-control form-control-sm" v-model="phone" type="tel" minlength="6"
                                    maxlength="9" autofocus>
                                <button @click="addPhone" class="btn btn-info btn-sm ml-1">
                                    Add
                                </button>

                            </div>
                        </div>
                    </div>
                    <div class="mt-3 float-right">
                        <button @click="register()" class="btn btn-info btn-sm ml-2">
                            Register
                        </button>
                    </div>
                </div>
            </div>
        </div>


        <div v-if="!policyList" class="mt-3 px-2 px-md-3 py-3">
            <h6> Policy No : @{{ customers.policyno }} </h6>
            <div class="row mt-4">
                <div class="col-md-6 hover-scale" @click="showMessage(customer.customer_code)"
                    v-for="(customer, key) in customers.customers">
                    <div class="card p-2">
                        <div class="card-body rounded" style="background: #CDCDCD">
                            <div class="d-flex">
                                <div style="width: 50%">
                                    <i class="bi bi-person-circle mr-2"></i> Policy Holder Name
                                </div>
                                <div style="width: 50%">
                                    <input class="form-control form-control-sm" :value="customer.customer_name"
                                        type="text" readonly>
                                </div>
                            </div>
                            <div class="d-flex mt-1">
                                <div style="width: 50%">
                                    <i class="bi bi-qr-code mr-2"></i>
                                    Customer Code
                                </div>
                                <div style="width: 50%">
                                    <input class="form-control form-control-sm" :value="customer.customer_code"
                                        type="text" readonly>
                                </div>
                            </div>
                            <div class="d-flex mt-1">
                                <div style="width: 50%">
                                    <i class="bi bi-credit-card-2-front mr-2"></i> Customer NRC
                                </div>
                                <div style="width: 50%">
                                    <input class="form-control form-control-sm" :value="customer.customer_nrc"
                                        type="text" readonly>
                                </div>
                            </div>
                            <div class="d-flex mt-1 ">
                                <div style="width: 50%">
                                    <i class="bi bi-telephone mr-2"></i> Customer Phone No
                                </div>
                                <div style="width: 50%">
                                    <input class="form-control form-control-sm" :value="customer.customer_phoneno"
                                        type="text" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
@endsection
@push('child-css')
    <style>
        .swal2-confirm {
            padding: 5px 10px 5px 10px;
            color: green
        }

        .swal2-cancel {
            padding: 5px 10px 5px 10px;
            color: red;
        }

        .hover-scale {
            transition: transform 0.3s ease;
        }

        .hover-scale:hover {
            transform: scale(1.03);
        }
    </style>
@endpush

@push('child-scripts')
    <script src="https://cdn.jsdelivr.net/npm/vue@3"></script>
    <script>
        const app = Vue.createApp({
            data() {
                const customers = @json($customers);
                let getPolicyListPanddingStatus = false;
                let httpError = undefined;
                let policyList = undefined;
                let selectCustomerObj = null;
                let phoneNumberArray = [];
                let phone = null;
                return {
                    customers,
                    getPolicyListPanddingStatus,
                    policyList,
                    selectCustomerObj,
                    phoneNumberArray
                };
            },
            methods: {
                showMessage(customer_code) {
                    this.selectCustomerObj = this.customers.customers.find(customer => customer
                        .customer_code === customer_code);
                    console.table(this.selectCustomerObj);
                    Swal.fire({
                        icon: "warning",
                        title: "Are you sure?",
                        text: this.selectCustomerObj.customer_code,
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        confirmButtonText: " Sure ",
                        cancelButtonText: "Select Again"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            this.getPolicyListByCustomerCode(this.selectCustomerObj.customer_code);
                        }
                    });
                },
                getPolicyListByCustomerCode(customerCode) {
                    alert(customerCode);
                    const headers = new Headers();
                    headers.append('Content-Type', 'application/json');
                    headers.append('Authorization', '{{ 'Bearer ' . Cache::get('token_for_internal') }}');
                    this.getPolicyListPanddingStatus = true;
                    fetch(`https://uatecom.ayasompo.com/PolicyManagement/getcustlistpolicies/${customerCode}`, {
                            method: 'GET',
                            headers: headers,
                        })
                        .then(async response => {
                            const responseJson = await response.json();
                            if (!response.ok) {
                                return Swal.fire({
                                    icon: "warning",
                                    title: "Erro",
                                    text: responseJson.message,
                                    showCancelButton: true,
                                    confirmButtonColor: "#3085d6",
                                    confirmButtonText: " Try Again ",
                                    cancelButtonText: "Cancel"
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        this.getPolicyListByCustomerCode(customerCode);
                                    }
                                })
                            }
                            this.getPolicyListPanddingStatus = false;
                            console.log(responseJson);
                            let filterData = responseJson.find(policyList => policyList.policyNumber ==
                                this.customers.policyno);
                            console.log(filterData);
                            this.policyList = filterData
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            return Swal.fire({
                                icon: "error",
                                title: "Erro*",
                                text: error.message,
                                showCancelButton: true,
                                confirmButtonColor: "#3085d6",
                                confirmButtonText: " Try Again ",
                                cancelButtonText: "Cancel"
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    this.getPolicyListByCustomerCode(customerCode);
                                }
                            });
                        });
                },
                addPhone() {
                    alert(this.phone.length);
                    if (this.phone.length < 6 || this.phone.length > 11)
                        return false
                    else {
                        this.phoneNumberArray.push("959" + this.phone);
                        this.phone = '';
                    }
                },
                removePhone(index) {
                    this.phoneNumberArray.splice(index, 1);
                },

                register() {
                    console.log(this.selectCustomerObj);
                    console.log(this.phoneNumberArray);

                    fetch('http://127.0.0.1:8000/admin/customer/register/group-customer', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'Accept': 'application/json',
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                            },
                            body: JSON.stringify({
                                "selectCustomerObj": this.selectCustomerObj,
                                "phoneNumberArray": this.phoneNumberArray
                            }),
                        })
                        .then(async response => {
                            const responseJson = await response.json();
                            if (!response.ok) {
                                return Swal.fire({
                                    icon: 'warning',
                                    title: 'Error',
                                    text: responseJson.message,
                                    showCancelButton: true,
                                    confirmButtonColor: '#3085d6',
                                    confirmButtonText: 'Try Again',
                                    cancelButtonText: 'Cancel',
                                }).then(result => {
                                    if (result.isConfirmed) {
                                        this.getPolicyListByCustomerCode(customerCode);
                                    }
                                });
                            }
                            console.log(responseJson);
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            return Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: error.message || 'Something went wrong',
                                showCancelButton: true,
                                confirmButtonColor: '#3085d6',
                                confirmButtonText: 'Try Again',
                                cancelButtonText: 'Cancel',
                            }).then(result => {
                                if (result.isConfirmed) {
                                    this.getPolicyListByCustomerCode(customerCode);
                                }
                            });
                        });
                }
            }
        });
        app.mount('#app');
    </script>
@endpush
