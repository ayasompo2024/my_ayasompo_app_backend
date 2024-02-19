<div class="row">
    <div class="col-lg-4"><label class="font-weight-normal" for="name"> Product Name </label></div>
    <div class="col-lg-8">
        <input id="name" value="{{ $product->name_mm }}" type="text" name="name_mm" autocomplete="name"
            class="form-control form-control-sm @error('name_mm') is-invalid @enderror" required placeholder="Product Name"
            minlength="2" maxlength="50">
        @error('name_mm')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
<div class="row mt-3">
    <div class="col-lg-4"><label class="font-weight-normal" for="title"> Title </label></div>
    <div class="col-lg-8">
        <input id="title" value="{{ $product->title_mm }}" type="text" name="title_mm" autocomplete="title" required
            class="form-control form-control-sm @error('title_mm') is-invalid @enderror" placeholder="Title" minlength="2"
            maxlength="50">
        @error('title_mm')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="row mt-3">
    <div class="col-lg-4"><label class="font-weight-normal" for="brief_description_mm">Brief Description</label></div>
    <div class="col-lg-8">
        <textarea id="brief_description_mm" rows="5" name="brief_description_mm"
            class="form-control @error('description') is-invalid @enderror">{{ $product->brief_description_mm }}</textarea>
        @error('brief_description_mm')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
