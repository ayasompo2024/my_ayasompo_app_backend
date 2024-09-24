@extends('admin.layout.app')
@section('content')
    <div class="container">
        <nav class="pt-3">
            Claim Case / All
            <a class="float-left" href="{{ url()->previous() }}"><i class="m-3 bi bi-arrow-left-square"></i></a>
        </nav>
        <div class="bg-light px-md-3 mt-4 mb-5">
            <div class="d-flex">
                <button class="btn bg-secondary w-50 rounded-0 ">
                    Motor
                    <span class="badge bg-info mr-4">
                        {{ $claims['motor']->total() }}
                    </span>
                </button>
                <button class="btn w-50 rounded-0">
                    Non Motor
                    <span class="badge bg-info mr-4">
                        {{ $claims['nonMotor']->total() }}
                    </span>
                </button>
            </div>
            <div>
                <table class="table table-responsive mt-2">
                    <thead>
                        <tr>
                            <th style="min-width: 200px">App Customer Name</th>
                            <th style="min-width: 100px">Vehicle No</th>
                            <th style="min-width: 200px">Driver Name</th>
                            <th style="min-width: 200px">Contact Fullname</th>
                            <th style="min-width: 180px">Contact Telephone</th>
                            <th style="min-width: 200px">Accident Location</th>
                            <th style="min-width: 200px">Accident Date & Time </th>
                            <th style="min-width: 140px">Customer Code</th>
                            <th style="min-width: 120px">Risk Name</th>
                            <th style="min-width: 120px">Product Code</th>
                            <th style="min-width: 100px">Class Code</th>
                            <th style="min-width: 100px">Risk Seq No</th>
                            <th style="min-width: 100px">Policy No</th>
                            <th style="min-width: 140px">Customer Type</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($claims['motor'] as $item)
                            <tr>
                                <td style="font-size: 15px">-</td>
                                <td style="font-size: 15px">{{ $item->vehicle_no }} </td>
                                <td style="font-size: 15px">{{ $item->driver_name }}</td>
                                <td style="font-size: 15px">{{ $item->contact_fullname }}</td>
                                <td style="font-size: 15px">{{ $item->contact_telephone }}</td>
                                <td style="font-size: 15px">{{ $item->accident_location }}</td>
                                <td style="font-size: 15px">{{ $item->accident_date }} {{ $item->accident_time }} </td>
                                <td style="font-size: 15px">{{ $item->customer_code }}</td>
                                <td style="font-size: 15px">{{ $item->risk_name }}</td>
                                <td style="font-size: 15px">{{ $item->product_code }}</td>
                                <td style="font-size: 15px">{{ $item->class_code }}</td>
                                <td style="font-size: 15px">{{ $item->risk_seq_no }}</td>
                                <td style="font-size: 15px">{{ $item->policy_no }}</td>
                                <td style="font-size: 15px">{{ $item->customer_type }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="float-right pb-3">
                {!! $claims['motor']->links('pagination::bootstrap-4') !!}
            </div>
        </div>
    </div>
@endsection
