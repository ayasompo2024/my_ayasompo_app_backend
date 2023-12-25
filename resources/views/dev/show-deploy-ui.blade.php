@extends('admin.layout.app')
@section('content')
    <div class="container" id="app">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent m-0">
                <li class="breadcrumb-item active p-0" aria-current="page">One Click Deployment</li>
            </ol>
        </nav>
        <div class="px-md-3  mt-2 mb-5">
            <div class="bg-light border rounded p-3">
                <div class="row">
                    <div class="col-md-6">
                        Repo
                    </div>
                    <div class="col-md-6">
                        :origin https://github.com/ShineShineDev/aya-sompo.git (fetch)
                        <br>
                        :origin https://github.com/ShineShineDev/aya-sompo.git (push)
                    </div>
                    <div class="col-md-6 mt-3">
                        Key
                    </div>
                    <div class="col-md-6 mt-3">
                        ....
                    </div>
                    <div class="mt-3">
                        <a @click="deploy" class="btn btn-secondary btn-sm">
                            <i class="bi bi-rocket"></i> Deploy Now
                        </a>
                        <span v-if="isLoading">
                            <span class="loader"></span>
                        </span>
                        <small v-else="isLoading" class="text-warning"> ! Change Visibility</small>
                    </div>
                </div>
            </div>
            <div v-if="results.length > 0" class="p-3 rounded bg-light border mt-1">
                <h6 class="pb-1 border-bottom">
                    Console
                </h6>
                <div class="mt-2">
                    <div v-for="result in results">
                        <span style="font-size:15px" class="text-info" v-text="result"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('child-scripts')
    <script src="https://cdn.jsdelivr.net/npm/vue@3"></script>
    <script>
        const app = Vue.createApp({
            data() {
                let results = [];
                let password = "7912"
                let isLoading = false;
                return {
                    results,
                    password,
                    isLoading
                };
            },
            methods: {
                deploy() {
                    if (prompt('Enter Password To Deploy:') != this.password) {
                        alert("Permission Denied")
                    } else {
                        this.isLoading = true;
                        fetch(`{{ url('/dev/code/deploy') }}`, {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'Accept': 'application/json',
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                                },
                            })
                            .then(async response => {
                                const responseJson = await response.json();
                                console.log(responseJson);
                                this.isLoading = false;
                                this.results = responseJson;
                            })
                            .catch(error => {});
                    }
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
