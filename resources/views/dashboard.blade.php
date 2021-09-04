@extends('layouts.main')

@section('content')
    <!-- Header -->
    <!-- Header -->
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Dashboard</h6>
                    </div>
                </div>
                <div class="row">
                    @if (Auth::user()->type == 'admin')
                        <!-- Card stats -->
                        <div class="col-xl-3 col-md-6">
                            <div class="card card-stats">
                                <!-- Card body -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">Total posts</h5>
                                            <span class="h2 font-weight-bold mb-0">{{ count($posts) }}</span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                                                <i class="ni ni-bullet-list-67"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card card-stats">
                                <!-- Card body -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">Total clients</h5>
                                            <span class="h2 font-weight-bold mb-0">{{ count($clients) }}</span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-gradient-blue text-white rounded-circle shadow">
                                                <i class="ni ni-single-02"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card card-stats">
                                <!-- Card body -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">Total trips</h5>
                                            <span class="h2 font-weight-bold mb-0">{{ count($trips) }}</span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                                                <i class="ni ni-calendar-grid-58"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card card-stats">
                                <!-- Card body -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">Total reservations</h5>
                                            <span class="h2 font-weight-bold mb-0">{{ count($reservations) }}</span>
                                        </div>
                                        <div class="col-auto">
                                            <div
                                                class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                                                <i class="ni ni-credit-card"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if (Auth::user()->type == 'client')
                        <!-- Card stats -->
                        <div class="col-xl-3 col-md-6">
                            <div class="card card-stats">
                                <!-- Card body -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">Total drivers</h5>
                                            <span class="h2 font-weight-bold mb-0">{{ count($drivers) }}</span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                                                <i class="ni ni-single-02"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card card-stats">
                                <!-- Card body -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">Total vehicles</h5>
                                            <span class="h2 font-weight-bold mb-0">{{ count($vehicles) }}</span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                                                <i class="ni ni-bus-front-12"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card card-stats">
                                <!-- Card body -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">Total trips</h5>
                                            <span class="h2 font-weight-bold mb-0">{{ count($trips) }}</span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-gradient-blue text-white rounded-circle shadow">
                                                <i class="ni ni-calendar-grid-58"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card card-stats">
                                <!-- Card body -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">Total reservations</h5>
                                            <span class="h2 font-weight-bold mb-0">{{ count($reservations) }}</span>
                                        </div>
                                        <div class="col-auto">
                                            <div
                                                class="icon icon-shape bg-gradient-yellow text-white rounded-circle shadow">
                                                <i class="ni ni-credit-card"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
        <div class="row">
            @if (Auth::user()->type == 'admin' || Auth::user()->type == 'client')
                <div class="col-xl-6">
                    <div class="card bg-default">
                        <div class="card-header bg-transparent">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h6 class="text-light text-uppercase ls-1 mb-1">Overview</h6>
                                    <h5 class="h3 text-white mb-0">Reservations</h5>
                                </div>
                                <div class="col">
                                    <ul class="nav nav-pills justify-content-end">
                                        <li class="nav-item mr-2 mr-md-0" onclick="showClChart('monthReservationChart')">
                                            <a href="#" class="nav-link py-2 px-3 active" data-toggle="tab">
                                                <span class="d-none d-md-block">Mois</span>
                                                <span class="d-md-none">M</span>
                                            </a>
                                        </li>
                                        <li class="nav-item" onclick="showClChart('DaysReservationChart')">
                                            <a href="#" class="nav-link py-2 px-3" data-toggle="tab">
                                                <span class="d-none d-md-block">Jour</span>
                                                <span class="d-md-none">J</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- Chart -->
                            <div class="chart" id="monthReservationChart">
                                <!-- Chart wrapper -->
                                <canvas id="chart-click-dark" class="chart-canvas"></canvas>
                            </div>
                            <div class="chart" id="DaysReservationChart" style="display: none;">
                                <!-- Chart wrapper -->
                                <canvas id="chart-click-dark2" class="chart-canvas"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-header bg-transparent">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h6 class="text-uppercase text-muted ls-1 mb-1">Overview</h6>
                                    <h5 class="h3 mb-0">Comments</h5>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- Chart -->
                            <div class="chart" id="commentsChart">
                                <canvas id="chart-bars" class="chart-canvas"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
        <!-- Footer -->
        <footer class="footer pt-0">
            <div class="row align-items-center justify-content-lg-between">
                <div class="col-lg-6">
                    <div class="copyright text-center  text-lg-left  text-muted">
                        &copy; 2021 <a href="https://www.EasyTravel.com/" class="font-weight-bold ml-1"
                            target="_blank">EasyTravel</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                        <li class="nav-item">
                            <a href="https://www.EasyTravel.com/" class="nav-link" target="_blank">EasyTravel</a>
                        </li>
                    </ul>
                </div>
            </div>
        </footer>
    </div>
@endsection
@section('scripts')

    <script>
        var $chart = $('#chart-click-dark');
        var mois = ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre',
            'Novembre', 'Décembre'
        ];

        @if (Auth::user()->type == 'admin' || Auth::user()->type == 'client')
            $('document').ready(
            function() {
            var salesChart = new Chart($chart, {
            type: 'line',
            options: {
            scales: {
            yAxes: [{
            gridLines: {
            lineWidth: 1,
            color: '#5e72e4',
            zeroLineColor: '#5e72e4'
            }
            }]
            }
            },
            data: {
            labels: [
            @php
                $i = 1;
            @endphp
            @foreach ($reservationsMonthCount as $reservationCount)
                mois['{{ $reservationCount->dateMonth - 1 }}']
                @if ($i < count($reservationsMonthCount))
                    {{ ',' }}
                @endif
                @php
                    $i++;
                @endphp
            @endforeach
            ],
            datasets: [{
            label: 'Reservations',
            data: [
            @php
                $i = 1;
            @endphp
            @foreach ($reservationsMonthCount as $reservationCount)
                {{ $reservationCount->numberReservations }}
                @if ($i < count($reservationsMonthCount))
                    {{ ',' }}
                @endif
                @php
                    $i++;
                @endphp
            @endforeach
            ]
            }]
            }
            });
        
            // Save to jQuery object
        
            $chart.data('chart', salesChart);
        
        
            var $chart2 = $('#chart-click-dark2');
            var salesDayChart = new Chart($chart2, {
            type: 'line',
            options: {
            scales: {
            yAxes: [{
            gridLines: {
            lineWidth: 1,
            color: '#5e72e4',
            zeroLineColor: '#5e72e4'
            }
            }]
            }
            },
            data: {
            labels: [
            @php
                $i = 1;
            @endphp
            @foreach ($reservationsDayCount as $reservationCount)
                '{{ $reservationCount->dateDay }}'
                @if ($i < count($reservationsDayCount))
                    {{ ',' }}
                @endif
                @php
                    $i++;
                @endphp
            @endforeach
            ],
            datasets: [{
            label: 'Reservations',
            data: [
            @php
                $i = 1;
            @endphp
            @foreach ($reservationsDayCount as $reservationCount)
                {{ $reservationCount->numberReservations }}
                @if ($i < count($reservationsDayCount))
                    {{ ',' }}
                @endif
                @php
                    $i++;
                @endphp
            @endforeach
            ]
            }]
            }
            });
        
            // Save to jQuery object
        
            $chart2.data('chart', salesDayChart);
            }
            )
        
            var $chartbars = $('#chart-bars');
            var ordersChart = new Chart($chartbars, {
            type: 'bar',
            data: {
            labels: [
            @php
                $i = 1;
            @endphp
            @foreach ($commentsDayCount as $commentCount)
                '{{ $commentCount->dateDay }}'
                @if ($i < count($commentsDayCount))
                    {{ ',' }}
                @endif
                @php
                    $i++;
                @endphp
            @endforeach
            ],
            datasets: [{
            label: 'Comments',
            data: [
            @php
                $i = 1;
            @endphp
            @foreach ($commentsDayCount as $commentCount)
                {{ $commentCount->numberComments }}
                @if ($i < count($commentsDayCount))
                    {{ ',' }}
                @endif
                @php
                    $i++;
                @endphp
            @endforeach
            ]
            }]
            }
            });
        
            // Save to jQuery object
            $chartbars.data('chart', ordersChart);
        @endif

        function showMJChart(id) {
            if (id == 'monthChart') {
                $('#monthChart').show();
                $('#DaysChart').hide();
            } else {
                $('#monthChart').hide();
                $('#DaysChart').show();
            }
        }

        function showClChart(id) {
            if (id == 'monthReservationChart') {
                $('#monthReservationChart').show();
                $('#DaysReservationChart').hide();
            } else {
                $('#monthReservationChart').hide();
                $('#DaysReservationChart').show();
            }
        }

        function showMFChart(id) {
            if (id == 'mailersChart') {
                $('#mailersChart').show();
                $('#formsChart').hide();
            } else {
                $('#mailersChart').hide();
                $('#formsChart').show();
            }
        }
    </script>
@endsection
