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
    <div class="col-lg-8">

        <div>
            <div class="card"
                style="width: 200px;height: 200px;background-size: cover; background-image: url({{ $product->thumbnail }})">
            </div>
            <div class="tw-absolute">
                <div style="position: relative;top:-50px;left:3px">
                    <button onclick="getTragetGalleryID({{ $product->id }})" class="btn btn-secondary btn-sm"
                        data-toggle="modal" data-target="#addUpdatePhotoToGallery">
                        <i class="bi bi-cloud-arrow-up"></i>
                    </button>
                    <button class="btn btn-sm">
                        {{-- <form action="{{ route('admin.gallery.destroy', $product->id) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-sm bg-secondary">
                            <i class="bi bi-trash"></i> Delete
                        </button>
                    </form> --}}
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
