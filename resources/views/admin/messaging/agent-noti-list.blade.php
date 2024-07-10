@extends('admin.layout.app')
@section('content')
    <div class="container">
        <br>
        <div class="mx-3">
            Campaign Noit
            <a href="{{ route('admin.messaging.agent-noti-form') }}" class="float-right btn btn-sm  btn-danger">Send Campaign Noti</a>
        </div>
        <br>
        <div class="bg-light px-md-3 mx-3 mb-5 py-3 border rounded">
            <table class="table table-responsive-sm">
                <thead>
                    <tr>
                        <th class="p-1" style="min-width: 140px">Type</th>
                        <th class="p-1" style="min-width: 150px">Title</th>
                        <th class="p-1" style="min-width: 200px">Message</th>
                        <th class="p-1" style="min-width: 200px">Ago</th>
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
            @if ($histories->total() == 0)
                <p class="text-center pt-4"> No Record</p>
            @endif
            <br><br><br><br><br><br><br><br><br>
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
