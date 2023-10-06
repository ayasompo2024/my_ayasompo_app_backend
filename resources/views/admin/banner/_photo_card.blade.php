<div class="card IMG_BG tw-relative hover:tw-scale-105 tw-duration-500 tw-group"
    style="background-image: url({{ $product->image }});">
</div>

@push('child-css')
    <style>
        .IMG_BG {
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            height: 200px;
        }
    </style>
@endpush
