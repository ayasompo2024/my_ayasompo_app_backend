@extends('admin.layout.app')
@section('content')
    <div class="container">
        <nav class="pt-3">
            Request Form (Enquiry) / All
            <a class="float-left" href="{{ url()->previous() }}"><i class="m-3 bi bi-arrow-left-square"></i></a>
            <span class="float-right badge bg-info mr-4">
                {{ $requestForms->total() }}
            </span>
        </nav>
        <div class="bg-light px-md-3 mt-2 mb-5">
            <table class="table table-responsive">
                <thead class="bg-info p-1">
                    <tr>
                        <th class="p-1" style="min-width: 200px">Inquiry Date time</th>
                        <th class="p-1" style="min-width: 200px">App User Name</th>
                        <th class="p-1" style="min-width: 130px">Inquiry Type</th>
                        <th class="p-1" style="min-width: 200px">Title</th>
                        <th class="p-1" style="min-width: 200px">Status</th>
                        <th class="p-1" style="min-width: 100px">Case ID *</th>
                        <th class="p-1" style="min-width: 300px">Incident ID</th>
                        <th class="p-1" style="min-width: 200px">Case Number</t h>
                        <th class="p-1" style="min-width: 200px">Policy No</th>
                        <th class="p-1" style="min-width: 200px">Customer Code</th>
                        <th class="p-1" style="min-width: 200px">Product & Class Code</th>
                        <th class="p-1" style="min-width: 200px">Risk Sequence No</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($requestForms as $requestForm)
                        <tr>
                            <td class="p-1" style="font-size: 15px">
                                {{ \Carbon\Carbon::parse($requestForm->ayasompo_inquirydatetime)->format('Y-m-d h:i:s A') }}
                            </td>
                            <td title="{{ $requestForm->customer->customer_phoneno ?? '' }}" class="p-1"
                                style="font-size: 15px">
                                {{ $requestForm->customer->user_name ?? '' }}
                                @if (!is_null($requestForm->customer))
                                    <a href="{{ route('admin.messaging.unicast.show-form', $requestForm->customer->id) }}"
                                        class="ml-1" style="font-size: 15px"><i
                                            class="bi bi-bell bg-info rounded p-1"></i></a>
                                @endif
                            </td>
                            <td class="p-1" style="font-size: 15px"> {{ $requestForm->inquiry_type }} </td>
                            <td class="p-1" style="font-size: 15px"> {{ $requestForm->title }} </td>
                            <td class="p-1" style="font-size: 15px">
                                @if ($requestForm->inquiry_status == 'Success')
                                    <span class="badge bg-success">{{ $requestForm->inquiry_status }}</span>
                                @elseif($requestForm->inquiry_status == 'Follow Up')
                                    <span class="badge bg-info">{{ $requestForm->inquiry_status }}</span>
                                @elseif($requestForm->inquiry_status == 'Cancel')
                                    <span class="badge bg-warning">{{ $requestForm->inquiry_status }}</span>
                                @else
                                    <span class="badge bg-danger">{{ $requestForm->inquiry_status }}</span>
                                @endif
                            </td>
                            <td class="p-1" style="font-size: 15px"> {{ $requestForm->ayasompo_caseid }} </td>
                            <td class="p-1" style="font-size: 15px"> {{ $requestForm->incidentid }} </td>
                            <td class="p-1" style="font-size: 15px"> {{ $requestForm->ayasompo_casenumber }} </td>
                            <td class="p-1" style="font-size: 15px"> {{ $requestForm->ayasompo_policyno }} </td>
                            <td class="p-1" style="font-size: 15px"> {{ $requestForm->ayasompo_customercode }} </td>
                            <td class="p-1" style="font-size: 15px"> {{ $requestForm->ayasompo_productcode }} /
                                {{ $requestForm->ayasompo_classcode }} </td>
                            <td class="p-1" style="font-size: 15px"> {{ $requestForm->ayasompo_risksequenceno }} </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="float-right pb-3">
                {!! $requestForms->links('pagination::bootstrap-4') !!}
            </div>
        </div>
    </div>
@endsection
