@extends('admin.layout.app')
@section('content')
    <div class="container bg-white pb-4" id="app">
        <nav class="pt-3 pl-3">
            Admin / Logs
            <span class="badge bg-info ml-2">{{ $logs->total() }}</span>
        </nav>

        <div class="float-right">
            <form action="{{ route('admin.dashboard.logs.admin') }}" method="get">
                <div class="input-group mb-2 mr-sm-2">
                    <input type="date" name="date" required class="form-control form-control-sm">
                    <div class="input-group-prepend bg-secondary">
                        <button type="submit" class="btn btn-sm text-white"><i class="bi bi-search"></i></button>
                    </div>
                </div>
            </form>
        </div>

        <div class="bg-white px-md-3 mt-2 pt-3 mt-2 " style="min-height: 50vh">
            <div v-show="currentSelectObj != ''">
                <div>
                    <div></div>
                </div>
                <div class="card shadow-sm px-4 pb-4 pt-2 bg-dark ">
                    <div class="">
                        <button @click="removeDetail()" class="float-right btn btn-sm"><i class="bi bi-x-circle-fill text-warning"></i></button>
                    </div>
                    <div class="row">
                        <div class="col-md-3">Account</div>
                        <div class="col-md-8">
                            <p class="text-white" v-if="currentSelectObj && currentSelectObj.admin">
                                @{{ currentSelectObj.admin.name }}
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">IP</div>
                        <div class="col-md-8">
                            <p class="text-white" v-if="currentSelectObj && currentSelectObj.admin">
                                @{{ currentSelectObj.ip }}
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">URL</div>
                        <div class="col-md-8">
                            <p class="text-white" v-if="currentSelectObj && currentSelectObj.admin">
                                @{{ currentSelectObj.url }}
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">Method</div>
                        <div class="col-md-8">
                            <p class="text-white" v-if="currentSelectObj && currentSelectObj.admin">
                                @{{ currentSelectObj.method }}
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">Request Data</div>
                        <div class="col-md-8">
                            <p class="text-white" v-if="currentSelectObj && currentSelectObj.admin">
                                @{{ currentSelectObj.req_data }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead class="bg-info">
                        <tr>
                            <th class="p-1" style="min-width: 140px">Account</th>
                            <th class="p-1" style="min-width: 100px">IP</th>
                            <th class="p-1" style="min-width: 200px">URL</th>
                            <th class="p-1" style="min-width: 50px">Method</th>
                            <th class="p-1" style="min-width: 50px">Date & Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr @click="showDetail(key)" v-for="(item, key) in logs" style="cursor: pointer;">
                            <td style="font-size: 14px" v-text="item.admin.name"></td>
                            <td style="font-size: 14px" v-text="item.ip"></td>
                            <td style="font-size: 14px" v-text="item.url"></td>
                            <td style="font-size: 14px" v-text="item.method"></td>

                            <td style="font-size: 14px" v-text="item.created_at"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="float-right pb-3">
            <p class="">
                {!! $logs->links('pagination::bootstrap-4') !!}
            </p>
        </div>
    </div>
@endsection
@push('child-scripts')
    <script>
        const app = SpideyShine.createApp({
            data() {
                const logs = @json($logs->items());
                console.log(logs);
                const currentSelectObj = '';
                return {
                    logs,
                    currentSelectObj,
                };
            },
            methods: {
                showDetail(index) {
                    this.currentSelectObj = this.logs[index];
                    console.log(this.currentSelectObj.admin.name);
                },
                removeDetail() {
                    this.currentSelectObj = '';
                },
            }
        });
        app.mount('#app');
    </script>
@endpush
