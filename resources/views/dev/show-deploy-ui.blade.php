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
        .loader {
            width: 32px;
            height: 90px;
            display: block;
            margin: 20px auto;
            position: relative;
            border-radius: 50% 50% 0 0;
            border-bottom: 10px solid #FF3D00;
            background-color: #FFF;
            background-image: radial-gradient(ellipse at center, #FFF 34%, #FF3D00 35%, #FF3D00 54%, #FFF 55%), linear-gradient(#FF3D00 10px, transparent 0);
            background-size: 28px 28px;
            background-position: center 20px, center 2px;
            background-repeat: no-repeat;
            box-sizing: border-box;
            animation: animloaderBack 1s linear infinite alternate;
        }

        .loader::before {
            content: '';
            box-sizing: border-box;
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            width: 64px;
            height: 44px;
            border-radius: 50%;
            box-shadow: 0px 15px #FF3D00 inset;
            top: 67px;
        }

        .loader::after {
            content: '';
            position: absolute;
            left: 50%;
            transform: translateX(-50%) rotate(45deg);
            width: 34px;
            height: 34px;
            top: 112%;
            background: radial-gradient(ellipse at center, #ffdf00 8%, rgba(249, 62, 0, 0.6) 24%, rgba(0, 0, 0, 0) 100%);
            border-radius: 50% 50% 0;
            background-repeat: no-repeat;
            background-position: -44px -44px;
            background-size: 100px 100px;
            box-shadow: 4px 4px 12px 0px rgba(255, 61, 0, 0.5);
            box-sizing: border-box;
            animation: animloader 1s linear infinite alternate;
        }

        @keyframes animloaderBack {

            0%,
            30%,
            70% {
                transform: translateY(0px);
            }

            20%,
            40%,
            100% {
                transform: translateY(-5px);
            }
        }

        @keyframes animloader {
            0% {
                box-shadow: 4px 4px 12px 2px rgba(255, 61, 0, 0.75);
                width: 34px;
                height: 34px;
                background-position: -44px -44px;
                background-size: 100px 100px;
            }

            100% {
                box-shadow: 2px 2px 8px 0px rgba(255, 61, 0, 0.5);
                width: 30px;
                height: 28px;
                background-position: -36px -36px;
                background-size: 80px 80px;
            }
        }
    </style>
@endpush
