@extends('admin.layout.app')
@section('content')
    <div class="container">

        <nav class="pt-3">
            Claim Case / All
            <a class="float-left" href="{{ url()->previous() }}"><i class="m-3 bi bi-arrow-left-square"></i></a>
        </nav>

        <div class="bg-light px-md-3 mt-4 mb-5">
            <div>
                <table class="table table-responsive mt-2">
                    <thead>
                        <tr>
                            <th style="min-width: 200px">App Customer Name</th>
                            <th style="min-width: 200px">Policy or risk name </th>
                            <th style="min-width: 200px">contact_fullname </th>
                            <th style="min-width: 200px">contact_telephone </th>
                            <th style="min-width: 200px">nrc_no </th>
                            <th style="min-width: 200px">passport_no </th>
                            <th style="min-width: 200px">product_type </th>
                            <th style="min-width: 200px">accident_date </th>
                            <th style="min-width: 200px">accident_time </th>
                            <th style="min-width: 200px">accident_description </th>
                            <th style="min-width: 200px">accident_damaged_photos </th>
                            <th style="min-width: 200px">signature_image </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($nonmotor as $item)
                            <tr>
                                <td style="font-size: 15px">-</td>
                                <th style="font-size: 15px"> {{ $item->app_customer_id }} </th>
                                <th style="font-size: 15px"> {{ $item->policy_or_risk_name }} </th>
                                <th style="font-size: 15px"> {{ $item->contact_fullname }} </th>
                                <th style="font-size: 15px"> {{ $item->contact_telephone }} </th>
                                <th style="font-size: 15px"> {{ $item->nrc_no }} </th>
                                <th style="font-size: 15px"> {{ $item->passport_no }} </th>
                                <th style="font-size: 15px"> {{ $item->product_type }} </th>
                                <th style="font-size: 15px"> {{ $item->accident_date }} </th>
                                <th style="font-size: 15px"> {{ $item->accident_time }} </th>
                                <th style="font-size: 15px"> {{ $item->accident_description }} </th>
                                <th style="font-size: 15px"> {{ $item->accident_damaged_photos }} </th>
                                <th style="font-size: 15px"> {{ $item->signature_image }} </th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="float-right pb-3">
                {!! $nonmotor->links('pagination::bootstrap-4') !!}
            </div>
        </div>
    </div>
@endsection
