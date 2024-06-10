@extends('layouts.main') @section('body')
    <div class="content">
        <div class="container pd-x-0 pd-lg-x-10 pd-xl-x-0">
            <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
                <div>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                            <li class="breadcrumb-item"><a href="#">{{ $title }}</a> / {{ $subTitle }}</li>
                        </ol>
                    </nav>
                    @foreach ($employee as $vEmployee)
                        <h5 class="mg-b-0 tx-spacing--1">Hello, {{ $vEmployee->employee_name }}
                            ({{ $vEmployee->employee_id }})
                            !
                        </h5>
                    @endforeach
                </div>
                <div class="d-none d-md-block">
                    <a href="/listItems" class="btn btn-sm pd-x-15 {{ $btnList }} btn-uppercase mg-l-5"><i
                            data-feather="list" class="wd-10 mg-r-5"></i> Items</a>
                    <a href="/profileEmploy/current" class="btn btn-sm pd-x-15 {{ $btnCurrent }} btn-uppercase mg-l-5"><i
                            data-feather="meh" class="wd-10 mg-r-5"></i> Initial Assessment</a>
                    <a href="/profileEmploy" class="btn btn-sm pd-x-15 {{ $btnActual }} btn-uppercase mg-l-5"><i
                            data-feather="smile" class="wd-10 mg-r-5"></i> Actual</a>
                </div>
            </div>

            <div class="row row-xs">
                <div class="col-lg-8 col-xl-9">
                    <div class="card">
                        <div
                            class="card-header bd-b-0 pd-t-20 pd-lg-t-25 pd-l-20 pd-lg-l-25 d-flex flex-column flex-sm-row align-items-sm-start justify-content-sm-between">
                            <div>
                                <h6 class="mg-b-5 tx-sans">Progress based on Competency and Level</h6>
                                <p class="tx-12 tx-color-03 mg-b-0">.</p>
                            </div>
                        </div><!-- card-header -->
                        <div class="card-body pd-lg-25">
                            <div class="row align-items-sm-end">
                                <div class="col-lg-8 col-xl-9">
                                    <div class="chart-six">
                                        <div id="chart"></div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-xl-3 mg-t-30 mg-lg-t-0">
                                    <div class="row">
                                        <div class="col-sm-6 col-lg-12">
                                            <div class="d-flex align-items-center justify-content-between mg-b-5">
                                                <h6 class="tx-uppercase tx-10 tx-spacing-1 tx-color-02 tx-semibold mg-b-0">
                                                    Level 1</h6>
                                                <span
                                                    class="tx-11 tx-color-03">{{ number_format($percentLevel1, 1) }}%</span>
                                            </div>
                                            <div class="d-flex align-items-end justify-content-between mg-b-5">
                                                <h5 class="tx-normal tx-rubik lh-2 mg-b-0">{{ $level1 }}</h5>
                                                <h6 class="tx-normal tx-rubik tx-color-03 lh-2 mg-b-0">{{ $Alllevel1 }}
                                                </h6>
                                            </div>
                                            <div class="progress ht-4 mg-b-0 op-5">
                                                <div class="progress-bar bg-teal wd-100p" role="progressbar"
                                                    aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-lg-12 mg-t-30 mg-sm-t-0 mg-lg-t-30">
                                            <div class="d-flex align-items-center justify-content-between mg-b-5">
                                                <h6 class="tx-uppercase tx-10 tx-spacing-1 tx-color-02 tx-semibold mg-b-0">
                                                    Level 2</h6>
                                                <span
                                                    class="tx-11 tx-color-03">{{ number_format($percentLevel2, 1) }}%</span>
                                            </div>
                                            <div class="d-flex justify-content-between mg-b-5">
                                                <h5 class="tx-normal tx-rubik mg-b-0">{{ $level2 }}</h5>
                                                <h5 class="tx-normal tx-rubik tx-color-03 mg-b-0">
                                                    <small>{{ $Alllevel2 }}</small>
                                                </h5>
                                            </div>
                                            <div class="progress ht-4 mg-b-0 op-5">
                                                <div class="progress-bar bg-primary wd-100p" role="progressbar"
                                                    aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-lg-12 mg-t-30">
                                            <div class="d-flex align-items-center justify-content-between mg-b-5">
                                                <h6 class="tx-uppercase tx-10 tx-spacing-1 tx-color-02 tx-semibold mg-b-0">
                                                    Level 3</h6>
                                                <span
                                                    class="tx-11 tx-color-03">{{ number_format($percentLevel3, 1) }}%</span>
                                            </div>
                                            <div class="d-flex justify-content-between mg-b-5">
                                                <h5 class="tx-normal tx-rubik mg-b-0">{{ $level3 }}</h5>
                                                <h5 class="tx-normal tx-rubik tx-color-03 mg-b-0">
                                                    <small>{{ $Alllevel3 }}</small>
                                                </h5>
                                            </div>
                                            <div class="progress ht-4 mg-b-0 op-5">
                                                <div class="progress-bar bg-orange wd-100p" role="progressbar"
                                                    aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-lg-12 mg-t-30">
                                            <div class="d-flex align-items-center justify-content-between mg-b-5">
                                                <h6 class="tx-uppercase tx-10 tx-spacing-1 tx-color-02 tx-semibold mg-b-0">
                                                    Level 4</h6>
                                                <span
                                                    class="tx-11 tx-color-03">{{ number_format($percentLevel4, 1) }}%</span>
                                            </div>
                                            <div class="d-flex justify-content-between mg-b-5">
                                                <h5 class="tx-normal tx-rubik mg-b-0">{{ $level4 }}</h5>
                                                <h5 class="tx-normal tx-rubik tx-color-03 mg-b-0">
                                                    <small>{{ $Alllevel4 }}</small>
                                                </h5>
                                            </div>
                                            <div class="progress ht-4 mg-b-0 op-5">
                                                <div class="progress-bar bg-pink wd-100p" role="progressbar"
                                                    aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div><!-- row -->

                                </div>
                            </div>
                        </div><!-- card-body -->
                    </div><!-- card -->
                </div>
                <div class="col-md-6 col-lg-4 col-xl-3 mg-t-10 mg-lg-t-0">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="mg-b-0 tx-sans">Progress Overall</h6>
                        </div><!-- card-header -->
                        <div class="card-body d-lg-10 pd-b-70">
                            <div class="chart-seven">
                                <div id="chart2"></div>
                            </div>
                        </div><!-- card-body -->
                        <div class="card-footer pd-20">
                            <div class="row">

                                <div class="col-6 mg-t-20">
                                    <p class="tx-10 tx-uppercase tx-medium tx-color-03 tx-spacing-1 mg-b-5">Competent</p>
                                    <div class="d-flex align-items-center">
                                        <div class="wd-10 ht-10 rounded-circle bg-teal mg-r-5"></div>
                                        <h5 class="tx-normal tx-rubik mg-b-0">{{ $sumCompetent }}</small>
                                        </h5>
                                    </div>
                                </div><!-- col -->
                                <div class="col-6 mg-t-20">
                                    <p class="tx-10 tx-uppercase tx-medium tx-color-03 tx-spacing-1 mg-b-5">Need Improve
                                    </p>
                                    <div class="d-flex align-items-center">
                                        <div class="wd-10 ht-10 rounded-circle bg-danger mg-r-5"></div>
                                        <h5 class="tx-normal tx-rubik mg-b-0">{{ $sumNeed }}</small>
                                        </h5>
                                    </div>
                                </div><!-- col -->
                            </div><!-- row -->
                        </div><!-- card-footer -->
                    </div><!-- card -->
                </div>

                <div class="col-lg-4 col-md-6 mg-t-10">
                    <div class="card">
                        <div class="card-body pd-y-20 pd-x-25">
                            <div class="row row-sm">
                                <div class="col-7">
                                    <h3 class="tx-normal tx-rubik tx-spacing--1 mg-b-5">{{ $trainingCompleted }}</h3>
                                    <h6 class="tx-11 tx-semibold tx-uppercase tx-spacing-1 tx-primary mg-b-5">
                                        Development Program Completed
                                    </h6>
                                    <p class="tx-11 tx-color-03 mg-b-0">completed development program based on ALDP.</p>
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
                                    <h3 class="tx-normal tx-rubik tx-spacing--1 mg-b-5">{{ $trainingPlanned }}</h3>
                                    <h6 class="tx-12 tx-semibold tx-uppercase tx-spacing-1 tx-teal mg-b-5">Development
                                        Program Plan
                                    </h6>
                                    <p class="tx-11 tx-color-03 mg-b-0">development program planned or not complete yet
                                        based on ALDP
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
                                    <h3 class="tx-normal tx-rubik tx-spacing--1 mg-b-5">{{ $trainingTotal }}</h3>
                                    <h6 class="tx-12 tx-semibold tx-uppercase tx-spacing-1 tx-pink mg-b-5">Total
                                        Development Program</h6>
                                    <p class="tx-11 tx-color-03 mg-b-0">total development program based on ALDP.</p>
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
        <script nonce="randomNonceValue">
            $(document).ready(function() {
                const scroll1 = new PerfectScrollbar('#scroll1', {
                    suppressScrollX: true
                });
            })


            $(document).ready(function() {
                $('#viewdata').DataTable();
            })

            var options = {
                chart: {
                    type: 'bar',
                    height: 300,
                    stacked: true
                },
                plotOptions: {
                    bar: {
                        horizontal: true
                    }
                },
                legend: {
                    show: false
                },
                series: [{
                    name: 'Competent',
                    data: {{ $competent }},
                    color: '#219C90'
                }, {
                    name: 'Need Improvement',
                    data: {{ $need }},
                    color: '#FC5185'
                }],
                xaxis: {
                    categories: <?= $competency ?>
                }
            }

            var chart = new
            ApexCharts(document.querySelector("#chart"), options);
            chart.render();

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
        </script>
    @endpush
@endsection
