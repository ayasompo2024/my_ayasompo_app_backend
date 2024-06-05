@extends('admin.layout.app')
@section('content')
    <div class="container bg-white" id="app" style="min-height:100vh">
        <div class="p-2">
            <h5 class="p-2 rounded">
                Need to send SMS <span class="badge float-right ml-2 bg-danger"> {{ count($pool) }} </span>
            </h5>
            <div class="mx-2 mt-3">
                <div class="row bg-light p-2  rounded">
                    <div style="cursor:pointer" v-for="(tab,index) in tabs"
                        :class="['col-4 d-flex justify-content-between ',
                            { 'font-weight-bold text-danger ': selectedTab === tab }
                        ]"
                        @click="selectType(tab)">
                        <span v-text="tab"></span> <strong v-text="'/'" v-if="index != 2"></strong>
                    </div>
                </div>
            </div>
            <div class="px-2  mt-2 bg-light px-2 py-3 rounded">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="p-1">#</th>
                            <th class="p-1">Phone</th>
                            <th class="p-1">Type</th>
                            <th class="p-1"> Sended SMS ?</th>
                            <th class="p-1"> User</th>
                            <th class="p-1" style="width:350px" class="">Invite</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(item, index) in current_items" style="font-size: 15px">
                            <td class="p-1" v-text="index + 1"></td>
                            <td class="p-1" v-text="item.phone"></td>
                            <td class="p-1" v-text="item.key"></td>
                            <td class="p-1" v-text="item.is_sended_sms"></td>
                            <td class="p-1" v-text="truncateContent(item.content)"></td>
                            <td class="p-1  p-1 ">
                                <button @click="sendSms(index)" :disabled="item.is_loading || isLoading"
                                    class="btn btn-sm btn-danger ml-2 d-flex align-items-center" style="height:25px">
                                    Send <i class="ml-1 bi bi-send-fill"></i>
                                    <span v-if="item.is_loading" class="loader"></span>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@push('child-scripts')
    <script>
        const app = SpideyShine.createApp({
            data() {
                const items = @json($pool);
                const tabs = [
                    'AGENT',
                    'EMPLOYEE',
                    'GROUP'
                ];
                console.log(items['AGENT']);
                let selectedTab = "AGENT";
                let current_items = items[selectedTab];
                return {
                    items,
                    isLoading: false,
                    tabs,
                    current_items,
                    selectedTab
                };
            },
            methods: {
                sendSms(index) {
                    const item = this.current_items[index];
                    this.current_items[index]['is_loading'] = true;
                    this.isLoading = true;
                    fetch(`{{ url('/') }}/admin/pool/resolve`, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'Accept': 'application/json',
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                            },
                            body: JSON.stringify(item),
                        })
                        .then(async response => {
                            const responseJson = await response.json();
                            //this.items = responseJson.data;
                            this.isLoading = false;
                            this.current_items.splice(index, 1);
                            console.log(responseJson);
                        })
                        .catch(error => {
                            this.isLoading = false;
                            console.log(error);
                        });
                },
                truncateContent(name) {
                    if (!name || name.length === 0) {
                        return "";
                    }
                    let truncatedName = name.substring(7);
                    return truncatedName.length > 10 ? truncatedName.substring(0, 10) + '...' : truncatedName;
                },

                selectType(type) {
                    this.selectedTab = type;
                    this.current_items = this.items[type]
                    console.log(this.current_items);
                }
            }
        });
        app.mount('#app');
    </script>
@endpush

@push('child-css')
    <style>
        .loader {
            width: 25px;
            height: 25px;
            border: 3px solid red;
            border-bottom-color: transparent;
            border-radius: 50%;
            display: inline-block;
            box-sizing: border-box;
            animation: rotation 1s linear infinite;
        }

        @keyframes rotation {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        .custom-border {
            border-bottom: 1px solid red;
        }
    </style>
@endpush
