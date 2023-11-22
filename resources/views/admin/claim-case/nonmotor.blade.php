@extends('admin.layout.app')
@section('content')
    <div class="container" id="app">

        <nav class="pt-3">
            Claim Case / Non Motor
            <a class="float-left" href="{{ url()->previous() }}"><i class="m-3 bi bi-arrow-left-square"></i></a>
        </nav>

        <div class="bg-light px-md-3 mt-4 mb-5">
            <div v-show="currentSelectObj != ''">
                <div class="card shadow-sm  mb-5 ">
                    <div>
                        <button @click="removeDetail()" class="float-right btn btn-sm mt-1 mr-1"><i
                                class="bi bi-x-circle-fill text-danger"></i></button>
                    </div>
                    <div class="px-md-5 ">

                        <div class="row mt-3">
                            <div class="col-md-6">Contact Fullname</div>
                            <div class="col-md-6 d-flex">
                                <span v-text="currentSelectObj.contact_fullname"></span>

                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">Contact Telephone</div>
                            <div class="col-md-6 d-flex">
                                <span v-text="currentSelectObj.contact_telephone"></span>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-6">NRC NO</div>
                            <div class="col-md-6 d-flex">
                                <span v-text="currentSelectObj.nrc_no"></span>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">Passport NO</div>
                            <div class="col-md-6 d-flex">
                                <span v-text="currentSelectObj.passport_no"> </span>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">Product Type</div>
                            <div class="col-md-6 d-flex">
                                <span v-text="currentSelectObj.product_type"></span>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-6">Accident Date & Time</div>
                            <div class="col-md-6 d-flex">
                                <span
                                    v-text="currentSelectObj.accident_date  + ' ' + currentSelectObj.accident_time"></span>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">Accident Description</div>
                            <div class="col-md-6 d-flex">
                                <span v-text="currentSelectObj.accident_description"></span>
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
            <div v-show="currentSelectObj == ''">
                <table class="table table-responsive mt-2 table-striped table-hover">
                    <thead>
                        <tr>
                            {{-- <th style="min-width: 200px">App Customer Name</th> --}}
                            <th style="min-width: 200px">Policy or risk name </th>
                            <th style="min-width: 200px">Contact Fullname </th>
                            <th style="min-width: 200px">Contact Telephone </th>
                            <th style="min-width: 200px">NRC No </th>
                            <th style="min-width: 200px">Passport No </th>
                            <th style="min-width: 200px">Product Type </th>
                            <th style="min-width: 200px">Accident Date & Time </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr @click="showDetail(key)" v-for="(item, key) in claimCases" style="cursor: pointer;">
                            {{-- <td style="font-size: 14px"> {{ $item->app_customer_id }} </td> --}}
                            <td style="font-size: 14px" v-text="item.policy_or_risk_name"> </td>
                            <td style="font-size: 14px" v-text="item.contact_fullname"> </td>
                            <td style="font-size: 14px" v-text="item.contact_telephone"> </td>
                            <td style="font-size: 14px" v-text="item.nrc_no"> </td>
                            <td style="font-size: 14px" v-text="item.passport_no"> </td>
                            <td style="font-size: 14px" v-text="item.product_type"> </td>
                            <td style="font-size: 14px" v-text="item.accident_date + ' '  + item.accident_time "> </td>
                        </tr>
                    </tbody>
                </table>
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
                }
            }
        });
        app.mount('#app');
    </script>
@endpush
