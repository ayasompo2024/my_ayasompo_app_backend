@extends('admin.layout.app')
@section('content')
    <div class="container">
        <nav aria-label="breadcrumb m-0 p-0">
            <ol class="breadcrumb m-0 pl-0 bg-transparent">
                <li class="breadcrumb-item active p-0 pl-1" aria-current="page">Message / All</li>
            </ol>
        </nav>
        <div class="bg-light px-md-3 mt-2 mb-5 pt-3 mt-2">
            <table class="table table-responsive-sm">
                <thead>
                    <tr>
                        <th style="min-width: 140px">Type</th>
                        <th style="min-width: 150px">Title</th>
                        <th style="min-width: 200px">Message</th>
                        <th style="min-width: 200px">Ago</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($histories as $history)
                        <tr style="font-size: 16px">
                            <td class="p-2">
                                <small class="card-link text-muted">
                                    @if ($history->type == 'Unicast')
                                        {{ $history->customer->user_name ?? '' }}
                                    @elseif($history->type == 'Multicast')
                                        <span class="badge bg-info">Multicast (See Customer)</span>
                                    @else
                                        <span class="badge bg-secondary">{{ $history->type }}</span>
                                    @endif
                                </small>
                            </td>
                            <td class="p-2">
                                {{ $history->title }}
                            </td>
                            <td style="cursor: pointer;" onclick="showMessage(this)" class="p-2"
                                title="{{ $history->message }}">
                                <span class="full_text" style="display: none;">{{ $history->message }}</span>
                                <span class="short_text">
                                    @if (strlen($history->message) > 10)
                                        {{ substr($history->message, 0, 31) }}
                                        ...
                                    @else
                                        {{ $history->message }}
                                    @endif

                                </span>
                            </td>
                            <td class="p-2">
                                {{ $history->created_at->diffForHumans() }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="float-right pb-3">
            <p class="">
                {!! $histories->links('pagination::bootstrap-4') !!}
            </p>
        </div>
    </div>
@endsection
@push('child-scripts')
    <script>
        function showMessage(el) {
            $(el).children('.full_text').show();
            $(el).children('.short_text').hide();
        }
        const removeNewphoto = () => {
            $('.preview-container').hide();
            $('.old-photo').show();
        }
    </script>
@endpush
