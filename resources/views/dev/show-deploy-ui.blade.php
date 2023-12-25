@extends('admin.layout.app')
@section('content')
    <div class="container" id="app">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent m-0">
                <li class="breadcrumb-item active p-0" aria-current="page">One Click Deployment</li>
            </ol>
        </nav>
        <div class="px-md-3  mt-2 mb-5">
            <div class="bg-dark rounded p-3">
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
                        <small class="text-warning">! Change Visibility</small>
                    </div>
                </div>
            </div>
            <div v-if="results.length > 0" class="p-3 rounded bg-dark mt-1">
                Console
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
                return {
                    results,
                    password
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
                                this.isLoading = false;
                                console.log(responseJson);
                                this.results = ["hello"];
                                console.log(this.results);
                            })
                            .catch(error => {

                            });
                    }
                    this.results = ["hello"];
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
