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
                        {{-- <th style="min-width: 200px">App Customer Phone</th>
                        <th style="min-width: 200px">App User Name</th> --}}
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
                        <th style="min-width: 200px">Inquiry Date time</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($requestForms as $requestForm)
                        <tr>
                            {{-- <td> c name </td> --}}
                            {{-- <td> c phone </td> --}}
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
                            <td class="p-1" style="font-size: 15px"> {{ $requestForm->ayasompo_inquirydatetime }} </td>
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
