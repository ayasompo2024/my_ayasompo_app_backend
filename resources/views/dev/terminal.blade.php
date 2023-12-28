@extends('admin.layout.app')

@section('content')
    <div class="container" id="app">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent m-0">
                <li class="breadcrumb-item active p-0" aria-current="page">Commands</li>
            </ol>
        </nav>
        <div class="bg-light px-md-3 mb-5">
            <div class="p-3 bg-dark rounded" style="height: 80vh;overflow: scroll">
                <div style="position: fixed;right: 50px;">
                    <i class="bi bi-x-circle-fill text-warning "></i>
                </div>
                <div class="mt-2">
                    <div v-for="result in results">
                        <span style="font-size:15px" class="text-info" v-text="result"></span>
                    </div>
                    <div style="font-size: 15px;">
                        > <input v-model="command" @keyup.enter="sendCommandToServer" class="bg-dark border-0" v-focus
                            style="width: 90%;color:yellow">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('child-css')
    <style>
        input:focus {
            outline: none;
            box-shadow: none;
        }
    </style>
@endpush

@push('child-scripts')
    <script src="https://cdn.jsdelivr.net/npm/vue@3"></script>
    <script>
        const app = Vue.createApp({
            data() {
                return {
                    hasPermission: false,
                    command: '',
                    results: [],
                };
            },
            methods: {
                sendCommandToServer() {
                    // if (!this.hasPermission) {

                    // }
                    // if (!this.hasPermission) {
                    //     return this.results.push("Permission Denied ! Enter Password ")
                    // }
                    this.isLoading = true;
                    fetch(`{{ url('/dev/command') }}`, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'Accept': 'application/json',
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                            },
                            body: JSON.stringify({
                                "command": this.command,
                            }),
                        })
                        .then(async response => {
                            const responseJson = await response.json();
                            if (!response.ok) {

                            }
                            this.isLoading = false;
                            console.log(responseJson);
                            this.results = responseJson;

                        })
                        .catch(error => {

                        });
                    this.command = '';
                },
            },
        });
        app.directive('focus', {
            mounted(el) {
                el.focus();
            },
        });
        app.mount('#app');
    </script>
@endpush
