@extends('admin.layout.app')
@section('content')
    <div class="container">
        <nav aria-label="breadcrumb m-0 p-0">
            <ol class="breadcrumb m-0 pl-0 bg-transparent">
                <li class="breadcrumb-item active p-0 pl-1" aria-current="page">Message / All</li>
            </ol>
        </nav>
        <div class="row mx-2 mt-1">
            @foreach ($histories as $history)
                <div class="col-md-3">
                    <div class="card p-2">
                        <div class="card-body p-1">
                            <p style="font-size: 14px;">
                                {{ $history->title }}
                            </p>
                            <p class="card-text">
                                {{ $history->message }}
                            </p>
                        </div>
                        <div class="card-footer p-1 bg-white">
                            <small class="card-link text-muted">
                                @if ($history->type == 'Unicast')
                                    {{ $history->customer->user_name ?? '' }}
                                @else
                                    <span class="badge bg-info">{{ $history->type }}</span>
                                @endif
                            </small>
                            <small class="card-link text-muted float-right">
                                {{ $history->created_at->diffForHumans() }}
                            </small>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="float-right pb-3">
            <p class="">
                {!! $histories->links('pagination::bootstrap-4') !!}
            </p>
        </div>
    </div>
@endsection
