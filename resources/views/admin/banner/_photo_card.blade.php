<div class="card IMG_BG tw-relative hover:tw-scale-105 tw-duration-500 tw-group"
    style="background-image: url({{ $banner->image }});">
</div>
<div class="border-top">
    <form class="d-inline" action="{{ route('admin.banner.change-status', $banner->id) }}" method="post">
        @method('put') @csrf
        <button class="btn btn-sm pl-0">
            @if ($banner->status)
                <i title="Close" class="bi bi-check-circle mx-2"></i>
            @else
                <i title="Open" class="bi bi-x-circle text-warning mx-2"></i>
            @endif
        </button>
    </form>
    <a href="{{ route('admin.banner.edit', $banner->id) }}" class="btn btn-sm pl-0">
        <i title="Delete" class="bi bi-pencil-square"></i>
    </a>
    <form class="d-inline" action="{{ route('admin.banner.destroy', $banner->id) }}" method="post">
        @method('delete') @csrf
        <button class="btn btn-sm pl-0">
            <i title="Delete" class="bi bi-trash mx-2"></i>
        </button>
    </form>
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
