<div>
    <div class="row mt-3">
        <div class="col-lg-4">
            <label for="name" style="font-weight: normal"> Product Name </label>
        </div>
        <div class="col-lg-8">
            <input id="name" value="{{ old('name') }}" type="text" name="name" autocomplete="name"
                class="form-control form-control-sm @error('name') is-invalid @enderror" placeholder="Product Name"
                minlength="2" maxlength="50">
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-lg-4">
            <label for="title" style="font-weight: normal"> Title </label>
        </div>
        <div class="col-lg-8">
            <input id="title" value="{{ old('title') }}" type="text" name="title" autocomplete="name"
                class="form-control form-control-sm @error('name') is-invalid @enderror" placeholder="Title"
                minlength="2" maxlength="50">
            @error('title')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-lg-4">
            <label for="description" style="font-weight: normal">Brief Description </label>
        </div>
        <div class="col-lg-8">
            <textarea id="description" name="brief_description" class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
            @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
</div>
