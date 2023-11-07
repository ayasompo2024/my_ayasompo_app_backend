@extends('admin.layout.app')
@section('content')
    <div class="container">

        <nav class="pt-3">
            Request Form (Enquiry) / All
            <a class="float-left" href="{{ url()->previous() }}"><i class="m-3 bi bi-arrow-left-square"></i></a>
            <span class="float-right badge bg-info mr-4">
                {{-- {{ $product_code_lists->total() }} --}}
            </span>
        </nav>

        <div class="bg-light px-md-3 mt-2 mb-5">
            <table class="table table-responsive">
                <thead>
                    <tr>
                        <th>casetypecode</th>
                        <th>title</th>
                        <th>ayasompo_enquiryproducttype</th>
                        <th>ayasompo_enquirytypes</th>
                        <th>ayasompo_enquirychannels</th>
                        <th>ayasompo_vehicleno</th>
                        <th>ayasompo_remark</th>
                        <th>customerid_contact</th>
                        <th>ayasompo_customercode</th>
                        <th>ayasompo_policyno</th>
                        <th>ayasompo_productcode</th>
                        <th>ayasompo_classcode</th>
                        <th>ayasompo_risksequenceno</th>
                        <th>ayasompo_inquirydatetime</th>
                        <th>ayasompo_accounthandlerlookup</th>
                        <th>ayasompo_caseid</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @foreach ($product_code_lists as $product_code_list)
                        <tr>
                            <td> {{ $product_code_list->class_code }} </td>
                            <td> {{ $product_code_list->class_description }} </td>
                            <td> {{ $product_code_list->product_code }} </td>
                            <td> {{ $product_code_list->product_description }} </td>
                            <td>
                                <a href="{{ route('admin.product-code-list.show-request-form-type', $product_code_list->id) }}"
                                    class="btn btn-sm btn-info float-right">
                                    Bind <i class="bi bi-arrow-return-right"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach --}}
                </tbody>
            </table>
            <div class="float-right pb-3">
                {{-- {!! $product_code_lists->links('pagination::bootstrap-4') !!} --}}
            </div>
        </div>
    </div>
@endsection
