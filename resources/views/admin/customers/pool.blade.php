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
                            { 'font-weight-bold text-danger border-bottom ': selectedTab === tab }
                        ]"
                        @click="selectType(tab)">
                        <span v-text="tab"></span> <strong v-text="'/'" v-if="index != 2"></strong>
                    </div>
                </div>
            </div>
            <div class="px-2  mt-2 bg-light px-2 py-3 rounded">
                <div v-if="selectedTab == 'GROUP'" class="d-flex justify-content-between">
                    <div>
                        <span v-if="policy_number">
                            Policy Number : @{{ policy_number }} <span
                                class="badge bg-danger">@{{ current_items.length }}</span> </span>
                    </div>
                    <div class="">
                        <input v-model="policy_number" placeholder="Enter Policy Number" class="mb-2"
                            type="form-control bg-light form-control-sm">
                    </div>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th class="p-1">#</th>
                            <th class="p-1">Date</th>
                            <th class="p-1">Phone</th>
                            <th class="p-1"> Name</th>
                            <th class="p-1">Policy Number</th>
                            <th class="p-1"> Sended SMS ?</th>
                            <th class="p-1 text-right pr-3">Invite&nbsp;</th>
                            <th class="p-1">Row ID</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-if="policy_number" style="font-size: 15px">
                            <td colspan="6" class="p-1 ">
                                <div class="progress-container border">
                                    <span class="progress-text text-info">@{{ progress }} /
                                        @{{ totalItems }}</span>
                                    <div class="progress-bar" :style="{ width: `${progressPercentage}%` }"></div>
                                </div>
                            </td>
                            <td colspan="3" class="p-1 d-flex  ">

                                <button @click="sendSelectRow()" v-if="policy_number"
                                    class="btn btn-sm btn-danger  d-flex justify-content-center align-items-center"
                                    style="height:25px">
                                    Send All
                                </button>
                                <button @click="togglePause()"
                                    class="btn btn-sm btn-warning text-white ml-2 d-flex align-items-center"
                                    style="height:25px">
                                    @{{ isPaused ? 'Resume' : 'Pause' }}
                                </button>
                            </td>
                        </tr>
                        <tr v-for="(item, index) in current_items" style="font-size: 15px">
                            <td class="p-1" v-text="index + 1"></td>
                            <td class="p-1">
                                <span v-if="isToday(item.created_at)" class="badge bg-success mr-2" v-text="'Today'"></span>
                                <span v-text="formatDate(item.created_at)"></span>
                            </td>
                            <td class="p-1" v-text="item.phone"></td>
                            <td class="p-1" v-text="item.name"></td>
                            <td class="p-1" v-text="item.policy_number"></td>
                            <td class="p-1" v-text="item.is_sended_sms"></td>
                            <td class="p-1  ">
                                <div class="d-flex justify-content-between">
                                    <button @click="sendSms(item,index)" :disabled="item.is_loading || isLoading"
                                        class="btn btn-sm btn-danger d-flex align-items-center" style="height:25px">
                                        <span>Send <i class=" bi bi-send-fill"></i></span>
                                    </button>
                                    <div>
                                        <span v-if="item.is_loading" class="loader2"></span>
                                    </div>
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                </div>
                            </td>
                            <td class="p-1" v-text="item.id"></td>
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
                console.log(items);
                const tabs = [
                    'AGENT',
                    'EMPLOYEE',
                    'GROUP'
                ];
                let selectedTab = "AGENT";
                let current_items = items[selectedTab];
                return {
                    items,
                    tabs,
                    current_items,
                    selectedTab,
                    policy_number: '',

                    isLoading: false,
                    isPaused: false,
                    progress: 0,
                    totalItems: 0,
                    itemQueue: [],
                };
            },
            watch: {
                policy_number(newVal, oldVal) {
                    this.current_items = this.items.GROUP.filter(item => item.policy_number == this
                        .policy_number.trim());
                }
            },
            computed: {
                progressPercentage() {
                    return (this.progress / this.totalItems) * 100;
                }
            },
            methods: {
                sendSelectRow() {
                    this.totalItems = this.current_items.length;
                    this.progress = 0;
                    this.isLoading = true;
                    this.isPaused = false;
                    this.itemQueue = [...this.current_items];
                    this.processQueue();
                },
                processQueue() {
                    if (this.itemQueue.length === 0) {
                        this.isLoading = false;
                        return;
                    }

                    if (!this.isPaused) {
                        const item = this.itemQueue.shift();
                        this.sendSms(item, this.current_items.indexOf(item)).then(() => {
                            this.processQueue();
                        });
                    } else {
                        setTimeout(this.processQueue, 100);
                    }
                },
                async sendSms(item, index) {
                    this.current_items[index]['is_loading'] = true;
                    try {
                        const response = await fetch(`{{ url('/') }}/admin/pool/resolve`, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'Accept': 'application/json',
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                            },
                            body: JSON.stringify(item),
                        });
                        const responseJson = await response.json();
                        const currentIndex = this.current_items.findIndex(i => i === item);
                        if (currentIndex !== -1) {
                            this.current_items.splice(currentIndex, 1);
                        }
                        this.progress += 1;
                    } catch (error) {
                        console.log(error);
                    }
                },
                togglePause() {
                    this.isPaused = !this.isPaused;
                    if (!this.isPaused) {
                        this.processQueue();
                    }
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
                },
                isToday(dateTime) {
                    const today = new Date();
                    const date = new Date(dateTime);
                    return date.getDate() === today.getDate() &&
                        date.getMonth() === today.getMonth() &&
                        date.getFullYear() === today.getFullYear();
                },
                formatDate(dateTime) {
                    const date = new Date(dateTime);
                    const today = new Date();
                    if (
                        date.getDate() === today.getDate() &&
                        date.getMonth() === today.getMonth() &&
                        date.getFullYear() === today.getFullYear()
                    ) {
                        return date.toLocaleTimeString([], {
                            hour: '2-digit',
                            minute: '2-digit'
                        });
                    } else {
                        const year = date.getFullYear();
                        const month = String(date.getMonth() + 1).padStart(2, '0');
                        const day = String(date.getDate()).padStart(2, '0');
                        const time = date.toLocaleTimeString([], {
                            hour: '2-digit',
                            minute: '2-digit'
                        });
                        const ampm = date.toLocaleTimeString([], {
                            hour12: true
                        }).slice(-2);
                        return `${year}-${month}-${day} ${time} `;
                    }
                },
            }
        });
        app.mount('#app');
    </script>
@endpush

@push('child-css')
    <style>
        .loader2 {
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

        .progress-container {
            width: 100%;
            background-color: #f3f3f3;
            overflow: hidden;
            position: relative;
        }

        .progress-bar {
            height: 24px;
            background-color: #DC3545;
            transition: width 0.4s ease;
        }

        .progress-text {
            position: absolute;
            width: 100%;
            text-align: center;
            top: 0;
            left: 0;
            line-height: 24px;
            color: #fff;
            font-weight: bold;
        }
    </style>
@endpush
