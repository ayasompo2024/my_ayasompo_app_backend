<div id="app">

    <div class="border rounded px-2 mt-2">
        <h5 class="border-bottom mt-0 pt-2">
            ENG
            <button type="button" @click="showENGFromToggle()" class="badge badge-info  border float-right"
                style="height: 28px">
                <i class="bi bi-caret-down"></i>
            </button>
        </h5>
        <div v-if='showENG'>
            @include('admin.product.partials._eng_form')
        </div>
        <br>
    </div>
    <div class="border rounded py-2 px-2 mt-2">
        <h5 class="border-bottom">
            MM
            <button type="button" @click="showMMFromToggle()" class="badge badge-info  border float-right"
                style="height: 28px">
                <i class="bi bi-caret-down"></i>
            </button>
        </h5>
        <div v-if='showMM'>
            @include('admin.product.partials._mm_form')
        </div>
    </div>
    <div class="px-2">
        <div class="row mt-3">
            <div class="col-lg-4">
                <label for="product_type" style="font-weight: normal">Product Type</label>
            </div>
            <div class="col-lg-8">
                <select id="product_type" name="product_type"
                    class="form-control form-control-sm @error('product_type') is-invalid @enderror">
                    @foreach (\App\Enums\ProductType::cases() as $enumValue)
                        <option>{{ $enumValue->value }} </option>
                    @endforEach
                </select>
                @error('product_type')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-lg-4">
                <label for="link" style="font-weight: normal"> Sort(Order) </label>
            </div>
            <div class="col-lg-8">
                <input id="desc" value="{{ old('sort') }}" type="number" name="sort" autocomplete="desc"
                    class="form-control form-control-sm" placeholder="Enter Sort Number">
            </div>
        </div>
    </div>
</div>

@push('child-scripts')
    <script>
        const app = SpideyShine.createApp({
            data() {
                let showENG = true
                let showMM = false
                return {
                    showENG,
                    showMM
                };
            },
            methods: {
                showENGFromToggle() {
                    this.showENG = !this.showENG
                },
                showMMFromToggle() {
                    this.showMM = !this.showMM
                },
            }
        });
        app.mount('#app');
    </script>
@endpush
