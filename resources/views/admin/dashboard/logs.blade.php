@extends('admin.layout.app')
@section('content')
    <div class="container bg-white pb-4">
        <nav class="pt-3 pl-3">
            Admin / All
            <span class="badge bg-info ml-2">{{ $logs->total() }}</span>
        </nav>
        <div class="bg-white px-md-3 mt-2 pt-3 mt-2 " style="min-height: 50vh">
            <div class="table-responsive">
                <table class="table">
                    <thead class="bg-info">
                        <tr>
                            <th class="p-2" style="min-width: 140px">Date & Time</th>
                            <th class="p-2" style="min-width: 140px">trace_id</th>
                            <th class="p-2" style="min-width: 200px">Customer</th>
                            <th class="p-2" style="min-width: 300px">Message</th>
                            <th class="p-2" style="min-width: 50px">Type</th>
                            <th class="p-2" style="min-width: 50px">Value</th>
                            <th class="p-2" style="min-width: 50px">Log Code</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($logs as $key => $item)
                            <tr style="font-size: 15px">
                                <td class="p-1">
                                    {{ $item->created_at }}
                                </td>
                                <td class="p-1">
                                    {{ $item->trace_id }}
                                </td>
                                <td class="p-1">
                                    {{-- {{ $item->customer_id }} --}}
                                </td>
                                <td style="cursor: pointer;width:300px" onclick="showMessage(this)" class="p-2"
                                    title="{{ $item->message }}">
                                    <span class="full_text" style="display: none;">{{ $item->message }}</span>
                                    <span class="short_text">
                                        @if (strlen($item->message) > 10)
                                            {{ substr($item->message, 0, 31) }}
                                            ...
                                        @else
                                            {{ $item->message }}
                                        @endif
                                    </span>
                                </td>
                                <td class="p-1">
                                    {{ $item->type }}
                                </td>
                                <td class="p-1">
                                    {{ ucfirst($item->value) }}
                                </td>
                                <td class="p-1">
                                    {{ ucfirst($item->log_code) }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="float-right pb-3">
            <p class="">
                {!! $logs->links('pagination::bootstrap-4') !!}
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
