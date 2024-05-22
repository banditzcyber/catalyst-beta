@extends('layouts.main')

@section('body')
    <div class="content">
        <div class="container pd-x-0 pd-lg-x-10 pd-xl-x-0">
            <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
                <div>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                        </ol>
                    </nav>
                    @foreach ($employee as $vEmployee)
                        @php
                            if ($vEmployee->gender == 'Male' or $vEmployee->gender == 'M') {
                                $gender = 'Mr.';
                            } else {
                                $gender = 'Mrs.';
                            }
                        @endphp
                        <h4 class="tx-sans mg-b-0 tx-spacing--1">Welcome {{ $gender }} {{ $vEmployee->employee_name }}
                            ({{ $vEmployee->employee_id }})
                        </h4>
                    @endforeach
                </div>
                <div class="d-none d-md-block">

                </div>
            </div>

            <div class="row row-xs">
                <div class="col-sm-6 col-lg-3">
                    <div class="card card-body">
                        <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Subordinate</h6>
                        <div class="d-flex d-lg-block d-xl-flex align-items-end">
                            <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1">{{ $subordinate }}</h3>

                        </div>

                    </div>
                </div><!-- col -->
                <div class="col-sm-6 col-lg-3 mg-t-10 mg-sm-t-0">
                    <div class="card card-body">
                        <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Completed Learning</h6>
                        <div class="d-flex d-lg-block d-xl-flex align-items-end">
                            <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1">{{ $competentLearning }}</h3>

                        </div>

                    </div>
                </div><!-- col -->
                <div class="col-sm-6 col-lg-3 mg-t-10 mg-lg-t-0">
                    <div class="card card-body">
                        <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Planned Learning</h6>
                        <div class="d-flex d-lg-block d-xl-flex align-items-end">
                            <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1">{{ $plannedLearning }}</h3>

                        </div>

                    </div>
                </div><!-- col -->
                <div class="col-sm-6 col-lg-3 mg-t-10 mg-lg-t-0">
                    <div class="card card-body">
                        <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Total Learning</h6>
                        <div class="d-flex d-lg-block d-xl-flex align-items-end">
                            <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1">{{ $countLearning }}</h3>

                        </div>

                    </div>
                </div><!-- col -->

                <div class="col-lg-12 col-xl-8 mg-t-10">

                    <div class="card">
                        <div class="card-header d-flex align-items-center justify-content-between tx-uppercase">
                            <h6 class="mg-b-0 tx-sans ">Progress Competency your teams</h6>

                        </div><!-- card-header -->

                        <div class="card-body">

                            <div class="ht-250 ht-lg-300"><canvas id="chartBar1"></canvas></div>

                        </div>
                    </div>

                </div><!-- col -->
                <div class="col-md-6 col-xl-4 mg-t-10">
                    <div class="card ht-lg-100p">
                        <div class="card-header d-flex align-items-center justify-content-between tx-uppercase">
                            <h6 class="mg-b-0 tx-sans ">Progress Competency your teams</h6>

                        </div><!-- card-header -->
                        <div class="card-body pd-b-0">

                            <div class="chart-five mg-b-10">
                                <div>
                                    <div class="chart-seven">
                                        <div id="chart2"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mg-b-20">
                                <div class="col tx-center">
                                    <h4 class="tx-normal tx-rubik tx-spacing--1 mg-b-10">
                                        {{ number_format($itemCompetent) }}</h4>
                                    <p class="tx-sans tx-11 tx-uppercase tx-spacing-1 tx-medium tx-color-03">Competent</p>
                                </div>
                                <div class="col tx-center">
                                    <h4 class="tx-sans tx-normal tx-rubik tx-spacing--1 mg-b-10">
                                        {{ number_format($itemNeed) }}
                                    </h4>
                                    <p class="tx-sans tx-11 tx-uppercase tx-spacing-1 tx-medium tx-color-03">Need
                                        Improvement
                                    </p>
                                </div>
                            </div><!-- row -->
                        </div><!-- card-body -->
                    </div>
                </div>


            </div>

            <div class="row row-xs">


                <div class="col-lg-4 col-md-6 mg-t-10">
                    <div class="card">
                        <div class="card-body pd-y-20 pd-x-25">
                            <div class="row row-sm">
                                <div class="col-7">
                                    <h3 class="tx-normal tx-rubik tx-spacing--1 mg-b-5">1</h3>
                                    <h6 class="tx-12 tx-semibold tx-uppercase tx-spacing-1 tx-primary mg-b-5">Completed
                                        Training
                                    </h6>
                                    <p class="tx-11 tx-color-03 mg-b-0">completed training based on ALDP.</p>
                                </div>
                                <div class="col-5">
                                    <div class="chart-ten">
                                        <div id="flotChart4" class="flot-chart"></div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- card-body -->
                    </div><!-- card -->
                </div><!-- col -->
                <div class="col-lg-4 col-md-6 mg-t-10">
                    <div class="card">
                        <div class="card-body pd-y-20 pd-x-25">
                            <div class="row row-sm">
                                <div class="col-7">
                                    <h3 class="tx-normal tx-rubik tx-spacing--1 mg-b-5">1</h3>
                                    <h6 class="tx-12 tx-semibold tx-uppercase tx-spacing-1 tx-teal mg-b-5">Planned
                                        Training
                                    </h6>
                                    <p class="tx-11 tx-color-03 mg-b-0">training planned or not complete yet based on ALDP
                                    </p>
                                </div>
                                <div class="col-5">
                                    <div class="chart-ten">
                                        <div id="flotChart4" class="flot-chart"></div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- card-body -->
                    </div><!-- card -->
                </div><!-- col -->
                <div class="col-lg-4 col-md-6 mg-t-10">
                    <div class="card">
                        <div class="card-body pd-y-20 pd-x-25">
                            <div class="row row-sm">
                                <div class="col-7">
                                    <h3 class="tx-normal tx-rubik tx-spacing--1 mg-b-5">1</h3>
                                    <h6 class="tx-12 tx-semibold tx-uppercase tx-spacing-1 tx-pink mg-b-5">Total
                                        Training</h6>
                                    <p class="tx-11 tx-color-03 mg-b-0">total training based on ALDP.</p>
                                </div>
                                <div class="col-5">
                                    <div class="chart-ten">
                                        <div id="flotChart5" class="flot-chart"></div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- card-body -->
                    </div><!-- card -->
                </div><!-- col -->

            </div><!-- row -->

        </div><!-- container -->
    </div><!-- content -->

    @push('scripts')
        <script>
            var config = {
                series: [{{ number_format($percent, 1) }}],
                labels: ['Progress'],
                chart: {
                    height: 270,
                    type: 'radialBar',
                    toolbar: {
                        show: true
                    }
                },
                plotOptions: {
                    radialBar: {
                        startAngle: -135,
                        endAngle: 225,
                        hollow: {
                            margin: 0,
                            size: '70%',
                            background: '#fff',
                            image: undefined,
                            imageOffsetX: 0,
                            imageOffsetY: 0,
                            position: 'front',
                            dropShadow: {
                                enabled: true,
                                top: 3,
                                left: 0,
                                blur: 4,
                                opacity: 0.24
                            }
                        },
                        track: {
                            background: '#fff',
                            strokeWidth: '30%',
                            margin: 0, // margin is in pixels
                            dropShadow: {
                                enabled: true,
                                top: -3,
                                left: 0,
                                blur: 4,
                                opacity: 0.35
                            }
                        },

                        dataLabels: {
                            show: true,
                            name: {
                                offsetY: -10,
                                show: false,
                                color: '#888',
                                fontSize: '17px'
                            },
                            value: {
                                formatter: function(val) {
                                    return val + "%";
                                },
                                color: '#111',
                                fontSize: '30px',
                                show: true,
                            }
                        }
                    }
                },
                fill: {
                    type: 'gradient',
                    gradient: {
                        shade: 'dark',
                        type: 'horizontal',
                        shadeIntensity: 0.5,
                        gradientToColors: ['#FC5185'],
                        inverseColors: true,
                        opacityFrom: 1,
                        opacityTo: 1,
                        stops: [0, 100]
                    }
                },
                stroke: {
                    lineCap: 'round'
                }
            };

            var chart = new ApexCharts(document.querySelector("#chart2"), config);
            chart.render();


            $(function() {
                'use strict'

                var ctxLabel = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
                var ctxData1 = [20, 60, 50, 45, 50, 60, 70, 40, 45, 35, 25, 30];
                var ctxData2 = [10, 40, 30, 40, 60, 55, 45, 35, 30, 20, 15, 20];
                var ctxColor1 = '#001737';
                var ctxColor2 = '#1ce1ac';

                // Bar chart
                var ctx1 = document.getElementById('chartBar1').getContext('2d');
                new Chart(ctx1, {
                    type: 'bar',
                    data: {
                        labels: ctxLabel,
                        datasets: [{
                            data: ctxData1,
                            backgroundColor: ctxColor1
                        }, {
                            data: ctxData2,
                            backgroundColor: ctxColor2
                        }]
                    },
                    options: {
                        maintainAspectRatio: false,
                        responsive: true,
                        legend: {
                            display: false,
                            labels: {
                                display: false
                            }
                        },
                        scales: {
                            yAxes: [{
                                gridLines: {
                                    color: '#e5e9f2'
                                },
                                ticks: {
                                    beginAtZero: true,
                                    fontSize: 10,
                                    fontColor: '#182b49',
                                    max: 80
                                }
                            }],
                            xAxes: [{
                                gridLines: {
                                    display: false
                                },
                                barPercentage: 0.6,
                                ticks: {
                                    beginAtZero: true,
                                    fontSize: 11,
                                    fontColor: '#182b49'
                                }
                            }]
                        }
                    }
                });
            })
        </script>
    @endpush
@endsection
