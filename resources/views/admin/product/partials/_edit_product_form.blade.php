<div id="app">
    <div class="border rounded px-2 mt-2">
        <h5 class="border-bottom mt-0 pt-2">
            ENG
            <button type="button" @click="showENGFromToggle()" class="badge badge-info  border float-right"
                style="height: 28px">
                <i class="bi bi-caret-down"></i>
            </button>
        </h5>
        <div v-if="showENG">
            @include('admin.product.partials._edit_eng_form')
        </div>
        <br>
    </div>
    <div class="border rounded px-2 mt-2">
        <h5 class="border-bottom mt-0 pt-2">
            MM
            <button type="button" @click="showENGFromToggle()" class="badge badge-info  border float-right"
                style="height: 28px">
                <i class="bi bi-caret-down"></i>
            </button>
        </h5>
        <div v-if="showENG">
            @include('admin.product.partials._edit_mm_form')
        </div>
        <br>
    </div>
    <div class="px-2 mt-4">
        <div class="row mt-3">
            <div class="col-lg-4"><label class="font-weight-normal" for="product_type">Product Type</label></div>
            <div class="col-lg-8">
                <select id="product_type" name="product_type" required
                    class="form-control form-control-sm @error('product_type') is-invalid @enderror">
                    @foreach (\App\Enums\ProductType::cases() as $enumValue)
                        <option @if ($product->product_type == $enumValue->value) selected @endif> {{ $enumValue->value }} </option>
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
                <label class="font-weight-normal" for="premium_calculator_url">Premium Calculator URL </label>
            </div>
            <div class="col-lg-8">
                <input id="premium_calculator_url" value="{{ $product->premium_calculator_url }}" type="text" name="premium_calculator_url" autocomplete="desc"
                    class="form-control form-control-sm" placeholder="Enter Sort Number">
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-lg-4">
                <label for="class_code" style="font-weight: normal"> Class Code </label>
            </div>
            <div class="col-lg-8">
                <input id="class_code" value="{{ $product->class_code }}" type="text" name="class_code" autocomplete="class_code"
                    class="form-control form-control-sm" placeholder="Enter Class Code">
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-lg-4">
                <label for="product_code" style="font-weight: normal"> Product Code </label>
            </div>
            <div class="col-lg-8">
                <input id="product_code" value="{{ $product->product_code }}" type="text" name="product_code" autocomplete="product_code"
                    class="form-control form-control-sm" placeholder="Product code">
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-lg-4">
                <label class="font-weight-normal" for="link"> Sort(Order) </label>
            </div>
            <div class="col-lg-8">
                <input id="desc" value="{{ $product->sort }}" type="number" name="sort" autocomplete="desc"
                    class="form-control form-control-sm" placeholder="Enter Sort Number">
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-lg-4"><label class="font-weight-normal" for="description">Thumbnail</label></div>
            <div class="col-lg-8" style="position: relative">
                <div class="card old-photo"
                    style="width: 200px;height: 200px;background-size: cover; background-image: url({{ $product->thumbnail }})">
                </div>
                <div class="preview-container" style="display: none">
                    <div id="imagePreview" style="width: 200px;height: 200px;background-size: cover;">
                        <button type="button" onclick="removeNewphoto()"
                            class="float-right btn btn-sm bg-warning mt-1 mr-1"><i
                                class="bi bi-x-circle-fill"></i></button>
                    </div>
                </div>
                <div style="position: absolute;top:165px;left:12px;">
                    <label class="btn btn-sm btn-info" for="thumbnail">
                        <i class="bi bi-cloud-arrow-up"></i>
                        <input type="file" hidden name="thumbnail" accept="image/*" id="thumbnail">
                    </label>
                </div>
            </div>
        </div>
    </div>
</div>

@push('child-scripts')
    <script>
        $(document).ready(function() {
            $('#thumbnail').on('change', function() {
                var selectedFiles = this.files;
                if (selectedFiles.length > 0) {
                    $('.old-photo').hide();
                    $('.preview-container').show();
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
                    };
                    reader.readAsDataURL(selectedFiles[0]);
                }
            });
        });
        const removeNewphoto = () => {
            $('.preview-container').hide();
            $('.old-photo').show();
        }
    </script>

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
