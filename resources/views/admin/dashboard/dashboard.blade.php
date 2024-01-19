@extends('admin.layout.app')
@section('content')
<div class="container">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb p-1 mt-2 bg-transparent pt-3 pl-3">
            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
        </ol>
    </nav>

    <!-- report overview -->
    <div class="row no-gutters bg-light px-2">
        @include('admin.dashboard._report_overview')
    </div>

    
</div>
@endsection
@push('child-scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
   
</script>
@endpush