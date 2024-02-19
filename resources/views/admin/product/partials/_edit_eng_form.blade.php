<div class="row">
    <div class="col-lg-4"><label class="font-weight-normal" for="name"> Product Name </label></div>
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
    <div class="col-lg-4"><label class="font-weight-normal" for="title"> Title </label></div>
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
    <div class="col-lg-4"><label class="font-weight-normal" for="description">Brief Description</label></div>
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
