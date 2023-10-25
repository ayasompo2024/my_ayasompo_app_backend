<div class="row">
    <div class="col-lg-4"><label for="name"> Product Name </label></div>
    <div class="col-lg-8">
        <input id="name" value="{{ $product->name }}" type="text" name="name" autocomplete="name"
            class="form-control form-control-sm @error('name') is-invalid @enderror" required placeholder="Product Name"
            minlength="2" maxlength="50">
        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
<div class="row mt-3">
    <div class="col-lg-4"><label for="title"> Title </label></div>
    <div class="col-lg-8">
        <input id="title" value="{{ $product->title }}" type="text" name="title" autocomplete="title" required
            class="form-control form-control-sm @error('name') is-invalid @enderror" placeholder="Title" minlength="2"
            maxlength="50">
        @error('title')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="row mt-3">
    <div class="col-lg-4"><label for="product_type">Product Type</label></div>
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
    <div class="col-lg-4"><label for="description">Brief Description</label></div>
    <div class="col-lg-8">
        <textarea id="description" rows="5" name="brief_description"
            class="form-control @error('description') is-invalid @enderror">{{ $product->brief_description }}</textarea>
        @error('description')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="row mt-3">
    <div class="col-lg-4"><label for="description">Thumbnail</label></div>
    <div class="col-lg-8" style="position: relative">
        <div class="card old-photo"
            style="width: 200px;height: 200px;background-size: cover; background-image: url({{ $product->thumbnail }})">
        </div>
        <div class="preview-container" style="display: none">
            <div id="imagePreview" style="width: 200px;height: 200px;background-size: cover;">
                <button type="button" onclick="removeNewphoto()" class="float-right btn btn-sm bg-warning mt-1 mr-1"><i
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
@endpush
