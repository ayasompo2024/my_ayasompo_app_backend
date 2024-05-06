@extends('admin.layout.app')
@section('content')
    <div class="container bg-white" id="app" style="min-height:100vh">
        <div class="p-2">
            <h5 class="p-2 rounded">
                Need to send SMS
            </h5>
            <div class="px-2">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="p-1">#</th>
                            <th class="p-1">Phone</th>
                            <th class="p-1">Type</th>
                            <th class="p-1"> Sended SMS ?</th>
                            <th style="width:350px" class="">Invite</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(item, index) in items" style="font-size: 15px">
                            <td class="p-1">@{{ index + 1 }}</td>
                            <td class="p-1">@{{ item.phone }}</td>
                            <td class="p-1">@{{ item.key }}</td>
                            <td class="p-1">@{{ item.is_sended_sms }}</td>
                            <td class="p-1  p-1">
                                <button @click="sendSms(index)"   :disabled="item.is_loading || isLoading"
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
                console.log(items);
                return {
                    items,
                    isLoading: false,

                };
            },
            methods: {
                sendSms(index) {
                    const item = this.items[index];
                    this.items[index]['is_loading'] = true;
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
                            this.items = responseJson.data;
                            this.isLoading = false;
                            console.log(responseJson);
                        })
                        .catch(error => {
                            this.isLoading = false;
                            console.log(error);
                        });
                },
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
    </style>
@endpush
