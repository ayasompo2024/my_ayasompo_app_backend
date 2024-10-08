@extends('admin.layout.app')
@section('content')
    <div class="container" id="app">
        <div v-if="isLoading"
            style="position: fixed;right: -80px;top: -50px;z-index:10000;background:white;width:
            300px;height:100px; ">
        </div>
        <div v-if="isLoading">
            <div style="position: fixed;right: -80px;top: -1px;z-index:10000">
                <span class="loader"></span>
            </div>
        </div>
        <nav class="pt-3 pl-3">
            Customer / New Group User
        </nav>


        <div v-if="checkExistPhones && !isOkAllSetp" class="row mt-3">
            <div class="col-md-10 offset-md-1 p-3 bg-white rounded">
                <h4 class="border-bottom">Exist As Group(Risk) User</h4>
                <div style="display: flex;flex-wrap: wrap;gap: 10px;">
                    <div v-for="(phone, key) in checkExistPhones.phones">
                        <div v-if="phone.appUsers.length > 0" class="btn btn-sm btn-danger border mt-1">
                            @{{ phone.phone }}
                            <span class="badge bg-secondary text-white ml-2">@{{ phone.appUsers.length }}</span>
                        </div>
                        <div v-if="phone.appUsers.length <= 0" class="btn btn-sm  border mt-1">
                            @{{ phone.phone }}
                            <span class="badge bg-danger text-white ml-2">@{{ phone.appUsers.length }}</span>
                        </div>
                    </div>
                </div>
                <button @click="register()" class="btn btn-sm bg-info mt-2">Add Now</button>
                <a @click="cancel()" class="btn btn-sm text-info btn-outline-secondary mt-2  ml-3">Cancle</a>
            </div>
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

        <div v-if="policyList && !checkExistPhones" class="row mt-3">
            <div class="col-md-10 offset-md-1 p-2 bg-white">
                <div class="card-body rounded  bg-light">
                    <div class="d-flex">
                        <div style="width: 40%">
                            <i class="bi bi-person-circle mr-2"></i> Customer Code
                        </div>
                        <div style="width: 60%">
                            <input class="form-control form-control-sm" :value="selectCustomerObj.customer_code"
                                type="text" readonly>
                        </div>
                    </div>
                    <div class="d-flex mt-1">
                        <div style="width: 40%">
                            <i class="bi bi-front mr-2"></i> Customer Type
                        </div>
                        <div style="width: 60%">
                            <input class="form-control form-control-sm" :value="selectCustomerObj.customer_type"
                                type="text" readonly>
                        </div>
                    </div>
                    <div class="d-flex mt-1">
                        <div style="width: 40%">
                            <i class="bi bi-credit-card-2-front mr-2"></i> Customer NRC
                        </div>
                        <div style="width: 60%">
                            <input class="form-control form-control-sm" :value="selectCustomerObj.customer_nrc"
                                type="text" readonly>
                        </div>
                    </div>
                    <div class="d-flex mt-1">
                        <div style="width: 40%">
                            <i class="bi bi-telephone mr-2"></i> Customer Phone No
                        </div>
                        <div style="width: 60%">
                            <input class="form-control form-control-sm" :value="selectCustomerObj.customer_phoneno"
                                type="text" readonly>
                        </div>
                    </div>
                    <div class="d-flex mt-1">
                        <div style="width: 40%">
                            <i class="bi bi-123 mr-2"></i> Policy Number
                        </div>
                        <div style="width: 60%">
                            <input class="form-control form-control-sm" :value="policyList.policyNumber" type="text"
                                readonly>
                        </div>
                    </div>
                    <div class="d-flex mt-1">
                        <div style="width: 40%">
                            <i class="bi bi-calendar-date mr-2"></i> Policy Date (Start - End)
                        </div>
                        <div style="width: 60%" class="d-flex">
                            <input class="form-control form-control-sm" :value="policyList.policyStartDate" type="text"
                                readonly>
                            <span class="mx-2"> - </span>
                            <input class="form-control form-control-sm" :value="policyList.policyEndDate" type="text"
                                readonly>
                        </div>
                    </div>
                    <div class="d-flex mt-1">
                        <div style="width: 40%">
                            <i class="bi bi-calendar-date mr-2"></i> Is Expiring
                        </div>
                        <div style="width: 60%">
                            <input v-if="policyList.isExpiring == null" class="form-control form-control-sm" value="No"
                                type="text" readonly>
                            <input v-else="policyList.isExpiring == null" class="form-control form-control-sm"
                                :value="policyList.isExpiring" type="text" readonly>
                        </div>
                    </div>
                    <div class="d-flex mt-1">
                        <div style="width: 40%">
                            <i class="bi bi-activity mr-2"></i> Policy Status
                        </div>
                        <div style="width: 60%">
                            <input class="form-control form-control-sm" :value="policyList.policyStatus" type="text"
                                readonly>
                        </div>
                    </div>
                    <div class="mt-3 float-right">
                        <button @click="preview()" :disabled="!isRegButDisabled" class="btn btn-info btn-sm ml-2">
                            Preview
                        </button>
                    </div>
                    <br>
                    <div class="mt-2">
                        <div>
                            <div>
                                <i class="bi bi-telephone mr-2"></i> Risks <span class="badge bg-info">
                                    @{{ riskOfpolicyList.length }} </span>
                            </div>
                            <div class="d-flex flex-wrap mt-2">
                                <div v-for="(risk, key) in riskOfpolicyList" class="mx-2">
                                    <div class="card p-1 px-2 bg-light">
                                        <div><strong style="font-size: 13px;"> Risk SeqNo : @{{ risk.risk_seqNo }}, Risk
                                                Name :
                                                @{{ risk.risk_name }}</strong>
                                        </div>
                                        <input class="form-control form-control-sm py-0 px-1" type="number"
                                            minlength="6" maxlength="9" :value="risk.phone"
                                            @keyup.enter="addPhone($event,key)" title="Please enter only numbers">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <br>
                <br>
            </div>
        </div>
        <div v-if="!policyList" class="mt-3 px-2 px-md-3 py-3">
            <h6> Policy No : @{{ customers.policyno }} </h6>
            <div class="row mt-4">
                <div class="col-md-6 hover-scale" @click="selectCustomer(customer.customer_code)"
                    v-for="(customer, key) in customers.customers">
                    <div class="card p-2">
                        <div class="card-body rounded bg-light">
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

@push('child-scripts')
    <script>
        const app = SpideyShine.createApp({
            data() {
                const customers = @json($customers);
                let isLoading = false;
                let policyList = undefined;
                let riskOfpolicyList = [];
                let selectCustomerObj = null;
                let phoneNumberArray = [];
                let phone = '';
                let checkExistPhones = '';
                let isOkAllSetp = false;
                return {
                    customers,
                    isLoading,
                    policyList,
                    riskOfpolicyList,
                    selectCustomerObj,
                    phoneNumberArray,
                    phone,
                    checkExistPhones,
                    isOkAllSetp
                };
            },
            methods: {
                selectCustomer(customer_code) {
                    this.selectCustomerObj = this.customers.customers.find(customer => customer
                        .customer_code === customer_code);
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
                    const headers = new Headers();
                    headers.append('Content-Type', 'application/json');
                    headers.append('Authorization', '{{ 'Bearer ' . Cache::get('token_for_internal') }}');
                    this.isLoading = true;
                    fetch(`{{ config('app.ayasompo_base_url') }}PolicyManagement/getcustlistpoliciesinvoice?customerCode=${customerCode}&policyno=${this.customers.policyno}`, {
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
                                    confirmButtonText: " Try Again ",
                                })
                            }
                            let filterData = responseJson.find(policyList => policyList.policyNumber ==
                                this.customers.policyno);
                            this.policyList = filterData
                            for (risk of filterData.risk) {
                                this.riskOfpolicyList.push({
                                    'risk_seqNo': risk.seqNo,
                                    'risk_name': risk.name,
                                    'phone': risk.phone
                                });
                            }
                            this.isLoading = false;
                        })
                        .catch(error => {
                            return Swal.fire({
                                icon: "error",
                                title: "Erro*",
                                text: error.message,
                                confirmButtonText: " Try Again ",
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    this.getPolicyListByCustomerCode(customerCode);
                                }
                            });
                        });
                },
                preview() {
                    this.isOkAllSetp = false;
                    this.isLoading = true;
                    fetch(`{{ url('/') }}/admin/customer/register/preview-customer`, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'Accept': 'application/json',
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                            },
                            body: JSON.stringify({
                                "select_customer_obj": this.selectCustomerObj,
                                "risk_of_policy_list": this.riskOfpolicyList
                            }),
                        })
                        .then(async response => {
                            const responseJson = await response.json();
                            if (!response.ok) {
                                return Swal.fire({
                                    icon: 'warning',
                                    title: 'Error',
                                    text: responseJson.meatadata.message,
                                    cancelButtonText: 'Try Again',
                                });
                            }
                            this.isLoading = false;
                            this.checkExistPhones = responseJson.data;
                        })
                        .catch(error => {
                            return Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: error.message || 'Something went wrong',
                                confirmButtonText: 'Try Again'
                            });
                        });
                },
                register(index) {
                    this.isLoading = true;
                    fetch(`{{ url('/') }}/admin/customer/register`, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'Accept': 'application/json',
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                            },
                            body: JSON.stringify({
                                "select_customer_obj": this.selectCustomerObj,
                                "risk_of_policy_list": this.riskOfpolicyList,
                                "policy_number": this.policyList.policyNumber
                            }),
                        })
                        .then(async response => {
                            const responseJson = await response.json();
                            this.isOkAllSetp = true;
                            this.isLoading = false;
                            this.checkExistPhones = ''
                            Swal.fire({
                                position: "top-end",
                                icon: "success",
                                title: responseJson.meatadata.message,
                                showConfirmButton: false,
                                timer: 1500
                            });
                        })
                        .catch(error => {
                            return Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: error.message || 'Something went wrong',
                                confirmButtonText: 'Try Again',
                            });
                        });
                },
                addPhone(target, index) {
                    return this.riskOfpolicyList[index].phone = event.target.value;
                    if (event.target.value < 100000 || event.target.value > 999999999) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: "Phone Number min length 6 and max length 9 ",
                            confirmButtonText: 'Try Again',
                        });
                        return false
                    } else {
                        this.riskOfpolicyList[index].phone = event.target.value;
                    }
                },
                removePhone(index) {
                    this.phoneNumberArray.splice(index, 1);
                },
                cancel() {
                    this.checkExistPhones = ''
                }
            },
            computed: {
                isRegButDisabled() {
                    return true
                },
            }
        });
        app.mount('#app');
    </script>
@endpush

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

        .loader {
            /* background-color: red; */
            width: 30px;
            height: 30px;
            border: 3px solid #e80404df;
            border-radius: 50%;
            display: inline-block;
            box-sizing: border-box;
            position: relative;
            animation: pulse 1s linear infinite;
        }

        .loader:after {
            content: '';
            position: absolute;
            width: 30px;
            height: 30px;
            border: 3px solid red;
            border-radius: 50%;
            display: inline-block;
            box-sizing: border-box;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            animation: scaleUp 1s linear infinite;
        }

        @keyframes scaleUp {
            0% {
                transform: translate(-50%, -50%) scale(0)
            }

            60%,
            100% {
                transform: translate(-50%, -50%) scale(1)
            }
        }

        @keyframes pulse {

            0%,
            60%,
            100% {
                transform: scale(1)
            }

            80% {
                transform: scale(1.2)
            }
        }
    </style>
@endpush
