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
                <thead>
                    <tr>
                        <th style="min-width: 200px">Inquiry Date time</th>
                        <th style="min-width: 200px">App User Name</th>
                        <th style="min-width: 130px">Inquiry Type</th>
                        <th style="min-width: 200px">Title</th>
                        <th style="min-width: 100px">Case ID *</th>
                        <th style="min-width: 300px">Incident ID</th>
                        <th style="min-width: 200px">Case Number</th>
                        <th style="min-width: 200px">Customer ID Contact</th>
                        <th style="min-width: 200px">Policy No</th>
                        <th style="min-width: 200px">Customer Code</th>
                        <th style="min-width: 200px">Product Code</th>
                        <th style="min-width: 200px">Class Code</th>
                        <th style="min-width: 200px">Risk Sequence No</th>
                        <th style="min-width: 200px">Vehicle no</th>
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
                                {{-- <small>{{ $requestForm->customer->id ?? '' }}</small> --}}
                                @if (!is_null($requestForm->customer))
                                    <a href="{{ route('admin.messaging.unicast.show-form', $requestForm->customer->id) }}"
                                        class="ml-1" style="font-size: 15px"><i
                                            class="bi bi-bell bg-info rounded p-1"></i></a>
                                @endif
                            </td>
                            <td class="p-1" style="font-size: 15px"> {{ $requestForm->inquiry_type }} </td>
                            <td class="p-1" style="font-size: 15px"> {{ $requestForm->title }} </td>
                            <td class="p-1" style="font-size: 15px"> {{ $requestForm->ayasompo_caseid }} </td>
                            <td class="p-1" style="font-size: 15px"> {{ $requestForm->incidentid }} </td>
                            <td class="p-1" style="font-size: 15px"> {{ $requestForm->ayasompo_casenumber }} </td>
                            <td class="p-1" style="font-size: 15px"> {{ $requestForm->customerid_contact }} </td>
                            <td class="p-1" style="font-size: 15px"> {{ $requestForm->ayasompo_policyno }} </td>
                            <td class="p-1" style="font-size: 15px"> {{ $requestForm->ayasompo_customercode }} </td>
                            <td class="p-1" style="font-size: 15px"> {{ $requestForm->ayasompo_productcode }} </td>
                            <td class="p-1" style="font-size: 15px"> {{ $requestForm->ayasompo_classcode }} </td>
                            <td class="p-1" style="font-size: 15px"> {{ $requestForm->ayasompo_risksequenceno }} </td>
                            <td class="p-1" style="font-size: 15px" <td> {{ $requestForm->ayasompo_vehicleno }} </td>
                            {{--  <td> {{ $requestForm->reason }} </td>
                            <td style="font-size: 15px"> {{ $requestForm->effective_date }} </td>
                            <td style="font-size: 15px"> {{ $requestForm->bank_account_number }} </td>
                            <td style="font-size: 15px"> {{ $requestForm->bank_name }} </td>
                            <td style="font-size: 15px"> {{ $requestForm->other_bank_name }} </td>
                            <td style="font-size: 15px"> {{ $requestForm->other_bank_address }} </td> --}}
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