<div>
    <div class="row mt-3">
        <div class="col-lg-4">
            <label for="name_mm" style="font-weight: normal"> Product Name </label>
        </div>
        <div class="col-lg-8">
            <input id="name_mm" value="{{ old('name_mm') }}" type="text" name="name_mm" autocomplete="name"
                class="form-control form-control-sm @error('name_mm') is-invalid @enderror" placeholder="Product Name"
                minlength="2" maxlength="50">
            @error('name_mm')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-lg-4">
            <label for="title_mm" style="font-weight: normal"> Title  </label>
        </div>
        <div class="col-lg-8">
            <input id="title_mm" value="{{ old('title_mm') }}" type="text" name="title_mm" autocomplete="name"
                class="form-control form-control-sm @error('title_mm') is-invalid @enderror" placeholder="Title"
                minlength="2" maxlength="50">
            @error('title_mm')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-lg-4">
            <label for="brief_description_mm" style="font-weight: normal">Brief Description </label>
        </div>
        <div class="col-lg-8">
            <textarea id="brief_description_mm" name="brief_description_mm" class="form-control @error('brief_description_mm') is-invalid @enderror">{{ old('description') }}</textarea>
            @error('brief_description_mm')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
</div>
