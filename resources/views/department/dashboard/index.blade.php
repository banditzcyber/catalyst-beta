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
                        <h4 class="mg-b-0 tx-spacing--1">Welcome {{ $gender }} {{ $vEmployee->employee_name }}
                            ({{ $vEmployee->employee_id }})
                        </h4>
                    @endforeach
                </div>
                <div class="d-none d-md-block">

                </div>
            </div>

            <div class="row row-xs">
                <div class="col-lg-7 col-xl-8">
                    <div class="card">
                        <div
                            class="card-header bd-b-0 pd-t-20 pd-lg-t-25 pd-l-20 pd-lg-l-25 d-flex flex-column flex-sm-row align-items-sm-start justify-content-sm-between">
                            <div>
                                <h6 class="mg-b-5">Progress based on Competency and Level</h6>
                                <p class="tx-12 tx-color-03 mg-b-0">.</p>
                            </div>
                        </div><!-- card-header -->
                        <div class="card-body pos-relative pd-0">
                            <div class="pos-absolute t-20 l-20 wd-xl-100p z-index-10">
                                <div class="row">
                                    <div class="col-sm-5">
                                        <h3 class="tx-normal tx-rubik tx-spacing--2 mg-b-5">$620,076</h3>
                                        <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-10">MRR
                                            Growth</h6>
                                        <p class="mg-b-0 tx-12 tx-color-03">Measure How Fast You’re Growing Monthly
                                            Recurring Revenue. <a href="">Learn More</a></p>
                                    </div><!-- col -->
                                    <div class="col-sm-5 mg-t-20 mg-sm-t-0">
                                        <h3 class="tx-normal tx-rubik tx-spacing--2 mg-b-5">$1,200</h3>
                                        <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-10">Avg.
                                            MRR/Customer</h6>
                                        <p class="mg-b-0 tx-12 tx-color-03">The revenue generated per account on a monthly
                                            or yearly basis. <a href="">Learn More</a></p>
                                    </div><!-- col -->
                                </div><!-- row -->
                            </div>
                            <div class="chart-one">
                                <div id="flotChart" class="flot-chart" style="padding: 0px; position: relative;"><canvas
                                        class="flot-base" width="640" height="350"
                                        style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 640.828px; height: 350px;"></canvas>
                                    <div class="flot-text"
                                        style="position: absolute; inset: 0px; font-size: smaller; color: rgb(84, 84, 84);">
                                        <div class="flot-x-axis flot-x1-axis xAxis x1Axis"
                                            style="position: absolute; inset: 0px;">
                                            <div class="flot-tick-label tickLabel"
                                                style="position: absolute; max-width: 49px; top: 337px; left: 34px; text-align: center;">
                                                Jan</div>
                                            <div class="flot-tick-label tickLabel"
                                                style="position: absolute; max-width: 49px; top: 337px; left: 85px; text-align: center;">
                                                Feb</div>
                                            <div class="flot-tick-label tickLabel"
                                                style="position: absolute; max-width: 49px; top: 337px; left: 133px; text-align: center;">
                                                Mar</div>
                                            <div class="flot-tick-label tickLabel"
                                                style="position: absolute; max-width: 49px; top: 337px; left: 184px; text-align: center;">
                                                Apr</div>
                                            <div class="flot-tick-label tickLabel"
                                                style="position: absolute; max-width: 49px; top: 337px; left: 233px; text-align: center;">
                                                May</div>
                                            <div class="flot-tick-label tickLabel"
                                                style="position: absolute; max-width: 49px; top: 337px; left: 284px; text-align: center;">
                                                Jun</div>
                                            <div class="flot-tick-label tickLabel"
                                                style="position: absolute; max-width: 49px; top: 337px; left: 334px; text-align: center;">
                                                Jul</div>
                                            <div class="flot-tick-label tickLabel"
                                                style="position: absolute; max-width: 49px; top: 337px; left: 383px; text-align: center;">
                                                Aug</div>
                                            <div class="flot-tick-label tickLabel"
                                                style="position: absolute; max-width: 49px; top: 337px; left: 434px; text-align: center;">
                                                Sep</div>
                                            <div class="flot-tick-label tickLabel"
                                                style="position: absolute; max-width: 49px; top: 337px; left: 482px; text-align: center;">
                                                Oct</div>
                                            <div class="flot-tick-label tickLabel"
                                                style="position: absolute; max-width: 49px; top: 337px; left: 532px; text-align: center;">
                                                Nov</div>
                                            <div class="flot-tick-label tickLabel"
                                                style="position: absolute; max-width: 49px; top: 337px; left: 582px; text-align: center;">
                                                Dec</div>
                                        </div>
                                    </div><canvas class="flot-overlay" width="640" height="350"
                                        style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 640.828px; height: 350px;"></canvas>
                                </div>
                            </div>
                            {{-- <div class="row align-items-sm-end">
                                <div class="col-lg-8 col-xl-9">
                                    <div class="chart-six">
                                        <div id="chart"></div>
                                    </div>
                                </div>

                            </div> --}}
                        </div><!-- card-body -->
                    </div><!-- card -->
                </div>
                <div class="col-md-6 col-lg-5 col-xl-4 mg-t-10 mg-lg-t-0">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="mg-b-0">Advancement of Your Team's Competencies</h6>
                        </div><!-- card-header -->
                        <div class="card-body d-lg-10 pd-b-70">
                            <div class="chart-seven">
                                <div id="chart2"></div>
                            </div>
                        </div><!-- card-body -->
                        <div class="card-footer pd-20">
                            <div class="row">

                                <div class="col-6 mg-t-10">
                                    <p class="tx-10 tx-uppercase tx-medium tx-color-03 tx-spacing-1 mg-b-5">Competent</p>
                                    <div class="d-flex align-items-center">
                                        <div class="wd-10 ht-10 rounded-circle bg-teal mg-r-5"></div>
                                        <h5 class="tx-normal tx-rubik mg-b-0">111</small>
                                        </h5>
                                    </div>
                                </div><!-- col -->
                                <div class="col-6 mg-t-10">
                                    <p class="tx-10 tx-uppercase tx-medium tx-color-03 tx-spacing-1 mg-b-5">Need Improvement
                                    </p>
                                    <div class="d-flex align-items-center">
                                        <div class="wd-10 ht-10 rounded-circle bg-orange mg-r-5"></div>
                                        <h5 class="tx-normal tx-rubik mg-b-0">11</small>
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
                                    <h6 class="tx-12 tx-semibold tx-uppercase tx-spacing-1 tx-teal mg-b-5">Planned Training
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
        </script>
    @endpush
@endsection
