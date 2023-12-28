@extends('admin.layout.app')
@section('content')
    <div class="container" id="app">

        <nav class="pt-3">
            Claim Case / Motor
            <a class="float-left" href="{{ url()->previous() }}"><i class="m-3 bi bi-arrow-left-square"></i></a>
        </nav>

        <div class="bg-light px-md-3 mt-4 mb-5">

            <div v-show="currentSelectObj == ''">
                <table class="table table-responsive mt-2 table-striped table-hover">
                    <thead>
                        <tr>
                            <th style="min-width: 200px">Created At</th>
                            {{-- <th style="min-width: 200px">App Customer Name</th> --}}
                            <th style="min-width: 100px;font-size:14px">Vehicle No</th>
                            <th style="min-width: 200px;font-size:14px">Driver Name</th>
                            <th style="min-width: 200px;font-size:14px">Contact Fullname</th>
                            <th style="min-width: 180px;font-size:14px">Contact Telephone</th>
                            <th style="min-width: 200px;font-size:14px">Accident Location</th>
                            <th style="min-width: 200px;font-size:14px">Accident Date & Time </th>
                            <th style="min-width: 140px;font-size:14px">Customer Code</th>
                            <th style="min-width: 120px;font-size:14px">Risk Name</th>
                            <th style="min-width: 120px;font-size:14px">Product Code</th>
                            <th style="min-width: 100px;font-size:14px">Class Code</th>
                            <th style="min-width: 100px;font-size:14px">Risk Seq No</th>
                            <th style="min-width: 100px;font-size:14px">Policy No</th>
                            <th style="min-width: 140px;font-size:14px">Customer Type</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr @click="showDetail(key)" v-for="(item, key) in claimCases" style="cursor: pointer;">
                            <td style="font-size: 15px">@{{ formatDateTime(item.created_at) }}</td>
                            {{-- <td style="font-size: 15px">@{{ item.id }}</td> --}}
                            <td style="font-size: 15px">@{{ item.vehicle_no }} </td>
                            <td style="font-size: 15px">@{{ item.driver_name }}</td>
                            <td style="font-size: 15px">@{{ item.contact_fullname }}</td>
                            <td style="font-size: 15px">@{{ item.contact_telephone }}</td>
                            <td style="font-size: 15px">@{{ item.accident_location }}</td>
                            <td style="font-size: 15px">@{{ item.accident_date }} @{{ item.accident_time }} </td>
                            <td style="font-size: 15px">@{{ item.customer_code }}</td>
                            <td style="font-size: 15px">@{{ item.risk_name }}</td>
                            <td style="font-size: 15px">@{{ item.product_code }}</td>
                            <td style="font-size: 15px">@{{ item.class_code }}</td>
                            <td style="font-size: 15px">@{{ item.risk_seq_no }}</td>
                            <td style="font-size: 15px">@{{ item.policy_no }}</td>
                            <td style="font-size: 15px">@{{ item.customer_type }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div v-show="currentSelectObj != ''">
                <div class="card shadow-sm  mb-5 ">
                    <div>
                        <button @click="removeDetail()" class="float-right btn btn-sm mt-1 mr-1"><i
                                class="bi bi-x-circle-fill text-danger"></i></button>
                    </div>
                    <div class="px-md-5 ">
                        <div class="row mt-2">
                            <div class="col-md-6">Vehicle No</div>
                            <div class="col-md-6 d-flex">
                                @{{ currentSelectObj.vehicle_no }}
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">Driver Name</div>
                            <div class="col-md-6 d-flex">
                                @{{ currentSelectObj.driver_name }}
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">Contact Fullname</div>
                            <div class="col-md-6 d-flex">
                                @{{ currentSelectObj.contact_fullname }}
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">Contact Telephone</div>
                            <div class="col-md-6 d-flex">
                                @{{ currentSelectObj.contact_telephone }}
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">Accident Location</div>
                            <div class="col-md-6 d-flex">
                                @{{ currentSelectObj.accident_location }}
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">Accident Date & Time</div>
                            <div class="col-md-6 d-flex">
                                @{{ currentSelectObj.accident_date }} @{{ currentSelectObj.accident_time }}
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">Accident Description</div>
                            <div class="col-md-6 d-flex">
                                @{{ currentSelectObj.accident_description }}
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">Accident Damaged Portion</div>
                            <div class="col-md-6 d-flex">
                                @{{ currentSelectObj.accident_damaged_portion }}
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">Customer Code </div>
                            <div class="col-md-6 d-flex">
                                @{{ currentSelectObj.customer_code }}
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">Risk Name</div>
                            <div class="col-md-6 d-flex">
                                @{{ currentSelectObj.risk_name }}
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">Product Code</div>
                            <div class="col-md-6 d-flex">
                                @{{ currentSelectObj.product_code }}
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">Class Code</div>
                            <div class="col-md-6 d-flex">
                                @{{ currentSelectObj.class_code }}
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">Risk Seq No</div>
                            <div class="col-md-6 d-flex">
                                @{{ currentSelectObj.risk_seq_no }}
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">Policy No</div>
                            <div class="col-md-6 d-flex">
                                @{{ currentSelectObj.policy_no }}
                            </div>
                        </div>
                        <div class="row my-3 ">
                            <div class="col-md-6">Customer Type</div>
                            <div class="col-md-6 d-flex">
                                @{{ currentSelectObj.customer_type }}
                            </div>
                        </div>
                        <div class=" my-3 ">
                            <h6>Accident Damaged Photos</h6>
                            <div class="row">
                                <div @click="showPhoto(item)"
                                    v-for="(item, key) in currentSelectObj.accident_damaged_photos" class="col-md-4 mt-1">
                                    <div class="border"
                                        :style="{
                                            cursor: 'pointer',
                                            width: '100%',
                                            height: '200px',
                                            backgroundImage: 'url(' + item + ')',
                                            backgroundSize: 'cover'
                                        }">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="my-3">
                            Signature Image
                            <div class="border"
                                :style="{
                                    cursor: 'pointer',
                                    width: '100%',
                                    height: '200px',
                                    backgroundImage: 'url(' + currentSelectObj.signature_image + ')',
                                    backgroundSize: 'cover'
                                }">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="popup-container" v-if="currentClickPhoto">
                <div class="popup-content p-5">
                    <div>
                        <button @click="removePhoto()" class="float-right btn"><i
                                class="bi bi-x-circle-fill text-danger"></i></button>
                    </div>
                    <img :src="currentClickPhoto" class="border">
                </div>
            </div>
            <div class="float-right pb-3">
                {!! $paginate->links('pagination::bootstrap-4') !!}
            </div>
        </div>
    </div>
@endsection

@push('child-css')
    <style>
        .popup-container {
            position: absolute;
            top: 0;
            width: 100%;
            height: 100%;
            background: white;
            justify-content: center;
            align-items: center;
        }

        .popup-content {
            max-width: 80%;
            max-height: 70%;
        }

        .popup-content img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }
    </style>
@endpush

@push('child-scripts')
    <script src="https://cdn.jsdelivr.net/npm/vue@3"></script>
    <script>
        const app = Vue.createApp({
            data() {
                const claimCases = @json($unserializeData);
                const currentSelectObj = '';
                const currentClickPhoto = ''
                return {
                    claimCases,
                    currentSelectObj,
                    currentClickPhoto
                };
            },
            methods: {
                showDetail(index) {
                    this.currentSelectObj = this.claimCases[index];
                    console.log(this.currentSelectObj);
                },
                removeDetail() {
                    this.currentSelectObj = '';
                },
                showPhoto(photo) {
                    this.currentClickPhoto = photo;
                },
                removePhoto() {
                    this.currentClickPhoto = '';
                },
                formatDateTime(dateTimeString) {
                    const date = new Date(dateTimeString);
                    const formattedDateTime = date.toLocaleString('en-US', {
                        year: 'numeric',
                        month: 'numeric',
                        day: 'numeric',
                        hour: 'numeric',
                        minute: 'numeric',
                        second: 'numeric',
                        hour12: true // Use 12-hour clock with am/pm
                    });

                    return formattedDateTime;
                },
            }
        });
        app.mount('#app');
    </script>
@endpush
