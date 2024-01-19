@extends('admin.layout.app')
@section('content')
    <div class="container bg-white" id="app">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent m-0">
                <li class="breadcrumb-item active p-0" aria-current="page">RunTime ENV Value</li>
            </ol>
        </nav>
        <div class="px-md-3  mt-2 mb-5">
            <p>
                Stage : <br>
                <span class="badge bg-light">{{ $env_values['stage'] }}</span>
            </p>
            <p>
                Create Inquiry Case URL
                <span class="badge bg-light">{{ $env_values['create_inquiry_case_url'] }}</span>
                <hr>
            </p>
            <p>
                Get Individual Customer ID By Cus Code
                <span class="badge bg-light">{{ $env_values['get_individual_customer_id_by_cus_code_api_url'] }}</span>
                <hr>
            </p>
            <p>
                Get Coorporate Customer ID By Cus Code
                <span class="badge bg-light">{{ $env_values['get_coorporate_customer_id_by_cus_code_api_url'] }}</span>
                <hr>
            </p>
            <p>
                Get Case Number By AYAS case ID
                <span class="badge bg-light">{{ $env_values['get_case_number_by_ayas_case_id'] }}</span>
                <hr>
            </p>
            <p>
                Crmenquiryproducttype
                <span class="badge bg-light">{{ $env_values['crm_enquiry_product_type'] }}</span>
                <hr>
            </p>
            <p>
                Crmenquirytypes
                <span class="badge bg-light">{{ $env_values['crm_enquiry_types'] }}</span>
                <hr>
            </p>
            <p>
                CrmAccountHandler
                <span class="badge bg-light">{{ $env_values['crm_account_handler'] }}</span>
                <hr>
            </p>
            <p>
                API Create Motor Case
                <span class="badge bg-light">{{ $env_values['create_motor_case_api_url'] }}</span>
                <hr>
            </p>
            <p>
                API Create Non-Motor Case
                <span class="badge bg-light">{{ $env_values['create_non_motor_case_api_url'] }}</span>
                <hr>
            </p>
            <p>
                API Upload File
                <span class="badge bg-light">{{ $env_values['upload_file_url'] }}</span>
                <hr>
            </p>
            <p>
                Send SMS URL
                <span class="badge bg-light">{{ $env_values['send_sms_url'] }}</span>
                <hr>
            </p>
            <p>
                Upstream Server Token For ({{ $env_values['syasompo_base_url'] }})
                <span class="badge bg-light">{{ $env_values['csharp_server_token_'] }}</span>
                <hr>
            </p>
            <p>
                Upstream Server Token For ({{ $env_values['crm_base_url'] }})
                <span class="badge bg-light">{{ $env_values['csharp_server_token_'] }}</span>
                <hr>
            </p>

            <p>
                serviceRoot
                <span class="badge bg-light">{{ $env_values['serviceRoot'] }}</span>
                <hr>
            </p>
        </div>
    </div>
@endsection
