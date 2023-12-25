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
                            Pulling....
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
