@extends('admin.layout.app')
@section('content')
    <div class="container">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb p-1 mt-2 bg-transparent pt-3 pl-3">
                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
        </nav>

        <div class="row no-gutters bg-light px-2">
            @include('admin.dashboard._report_overview')
        </div>
        <div class="row mt-4">
            <div class="col-md-6 px-md-3">
                <div class="card">
                    <h6 class="text-center text-muted mt-2 ">One Month</h6>
                    <canvas id="recordsChart" height="300"></canvas>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('child-scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        var ctx = document.getElementById('recordsChart').getContext('2d');
        var dates = @json($currentMonthChart->pluck('date')->toArray());
        var counts = @json($currentMonthChart->pluck('count')->toArray());

        var chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: dates,
                datasets: [{
                    label: 'Count', 
                    data: counts,
                    backgroundColor: '#17A2B8', // Transparent background color
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1,
                }]
            },
            options: {
                scales: {
                    x: [{
                        type: 'time',
                        time: {
                            unit: 'day',
                            displayFormats: {
                                day: 'MMM D'
                            },
                        },
                        title: {
                            display: true,
                            text: 'Date'
                        },
                        gridLines: {
                            display: false, // Hide grid lines on the x-axis
                        }
                    }],
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Record Count'
                        },
                        gridLines: {
                            color: 'rgba(0, 0, 0, 0.1)', // Light gray grid lines on the y-axis
                        }
                    }
                },
                legend: {
                    display: true,
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Records per Day - Current Month',
                    fontSize: 16,
                    padding: 20, // Add some padding to the title
                },
                tooltips: {
                    mode: 'index',
                    intersect: false,
                },
            }
        });
    </script>
@endpush
