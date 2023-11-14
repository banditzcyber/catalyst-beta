@extends('layouts.main') @section('body')
    <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
        <div>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                    <li class="breadcrumb-item">
                        <a href="#">{{ $title }}</a>
                    </li>
                </ol>
            </nav>

        </div>

    </div>

    <div class="row row-xs justify-content-right">

        <div class="col-lg-3 col-md-6">
            <div class="card card-body bd-1">
                <label class="tx-sans tx-12 tx-semibold tx-uppercase tx-color-01 tx-spacing-1 mg-b-10">
                    Profile
                </label>
                <div class="d-flex align-items-center justify-content-start mg-b-10 mg-l-0">
                    <a href="" class="avatar avatar-lg"><img src="https://via.placeholder.com/500"
                            class="rounded-circle" alt=""></a>
                </div>

                @foreach ($employee as $vEmployee)
                    <p class="tx-11 tx-color-03 mg-b-0"><?= $vEmployee->employee_id ?></p>
                    <h5 class="mg-b-2 tx-spacing--1"><?= $vEmployee->employee_name ?></h5>
                    <p class="tx-11 tx-color-03 mg-b-25"><?= $vEmployee->position ?></p>

                    <div class="mg-t-0">

                        <label class="tx-sans tx-9 tx-semibold tx-uppercase tx-color-01 tx-spacing-1 mg-b-5">
                            Email
                        </label>
                        <p class="tx-12 tx-color-03 mg-b-10"><?= $vEmployee->email ?></p>
                        <label class="tx-sans tx-9 tx-semibold tx-uppercase tx-color-01 tx-spacing-1 mg-b-5">
                            Section
                        </label>
                        <p class="tx-12 tx-color-03 mg-b-10"><?= $vEmployee->section ?></p>

                        <label class="tx-sans tx-9 tx-semibold tx-uppercase tx-color-01 tx-spacing-1 mg-b-5">
                            Department
                        </label>
                        <p class="tx-12 tx-color-03 mg-b-10"><?= $vEmployee->department ?></p>

                        <label class="tx-sans tx-9 tx-semibold tx-uppercase tx-color-01 tx-spacing-1 mg-b-5">
                            Division
                        </label>
                        <p class="tx-12 tx-color-03 mg-b-10"><?= $vEmployee->division ?></p>

                        <label class="tx-sans tx-9 tx-semibold tx-uppercase tx-color-01 tx-spacing-1 mg-b-5">
                            Jobcode
                        </label>
                        <p class="tx-12 tx-color-03 mg-b-10"><?= $vEmployee->jobcode ?></p>


                    </div><!-- col -->
                @endforeach
            </div>
        </div>

        <div class="col-lg-9 col-md-6">

            <div class="row row-xs">
                <div class="col-sm-6 col-lg-3">
                    <div class="card card-body"
                        style="border-right: 0; border-left: 3 solid; border-top: 0; border-bottom: 0;">
                        <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Planned Training</h6>
                        <div class="d-flex d-lg-block d-xl-flex align-items-end">
                            <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1">0</h3>
                        </div>
                    </div>
                </div><!-- col -->
                <div class="col-sm-6 col-lg-3 mg-t-10 mg-sm-t-0">
                    <div class="card card-body" style="border-right: 0; border-left: 1; border-top: 0; border-bottom: 0;">
                        <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Actual Traiining</h6>
                        <div class="d-flex d-lg-block d-xl-flex align-items-end">
                            <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1">0</h3>
                        </div>
                    </div>
                </div><!-- col -->
                <div class="col-sm-6 col-lg-3 mg-t-10 mg-lg-t-0">
                    <div class="card card-body" style="border-right: 0; border-left: 1; border-top: 0; border-bottom: 0;">
                        <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">-</h6>
                        <div class="d-flex d-lg-block d-xl-flex align-items-end">
                            <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1">0</h3>
                        </div>
                    </div>
                </div><!-- col -->
                <div class="col-sm-6 col-lg-3 mg-t-10 mg-lg-t-0">
                    <div class="card card-body" style="border-right: 0; border-left: 1; border-top: 0; border-bottom: 0;">
                        <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">-</h6>
                        <div class="d-flex d-lg-block d-xl-flex align-items-end">
                            <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1">0</h3>
                        </div>
                    </div>
                </div><!-- col -->
                <div class="col-lg-8 col-xl-8 mg-t-10">
                    <div class="card">
                        <div
                            class="card-header pd-t-20 pd-b-10 bd-b-0 d-md-flex align-items-center justify-content-between">
                            <h6 class="mg-b-0 tx-14 tx-uppercase tx-spacing-1 tx-semibold tx-dark">Progres based on
                                Competency</h6>
                            <ul class="list-inline d-flex mg-t-20 mg-sm-t-10 mg-md-t-0 mg-b-0">
                                <li class="list-inline-item d-flex align-items-center">
                                    <span class="d-block wd-10 ht-10 rounded mg-r-5"
                                        style="background-color: #46C2CB"></span>
                                    <span class="tx-sans tx-uppercase tx-10 tx-medium tx-color-03">Competent</span>
                                </li>
                                <li class="list-inline-item d-flex align-items-center mg-l-5">
                                    <span class="d-block wd-10 ht-10 rounded mg-r-5"
                                        style="background-color: #FC5185"></span>
                                    <span class="tx-sans tx-uppercase tx-10 tx-medium tx-color-03">Need Improvement</span>
                                </li>
                            </ul>
                        </div><!-- card-header -->
                        <div class="card-body pos-relative pd-0">


                            <div class="chart-one">
                                <div id="chart"></div>
                            </div><!-- chart-one -->
                        </div><!-- card-body -->
                    </div><!-- card -->
                </div>
                <div class="col-lg-4 col-xl-4 mg-t-10">
                    <div class="card">
                        <div class="card-header pd-t-20 pd-b-0 bd-b-0 tx-center">
                            <h6 class="mg-b-5 tx-14 tx-uppercase tx-spacing-1 tx-semibold tx-dark">Progress Overall</h6>
                            {{-- <p class="tx-12 tx-color-03 mg-b-0">percentage of competencies based on targets</p> --}}
                        </div><!-- card-header -->
                        <div class="card-body pd-20">
                            <div class="chart-two mg-b-0">
                                <div id="chart2"></div>
                            </div><!-- chart-two -->
                            <div class="row">
                                <div class="col-sm tx-center">
                                    <h4 class="tx-normal tx-rubik tx-spacing--1 mg-b-5">{{ $sumCompetent }}</h4>
                                    <p class="tx-9 tx-uppercase tx-spacing-1 tx-semibold mg-b-0 tx-primary">Competent</p>
                                </div><!-- col -->
                                <div class="col-sm mg-t-20 mg-sm-t-0 tx-center">
                                    <h4 class="tx-normal tx-rubik tx-spacing--1 mg-b-5">{{ $sumNeed }}</h4>
                                    <p class="tx-9 tx-uppercase tx-spacing-0 tx-semibold mg-b-0 tx-pink">Need Improvement
                                    </p>
                                </div><!-- col -->
                            </div><!-- row -->
                        </div><!-- card-body -->
                    </div><!-- card -->
                </div>

            </div>
        </div>

        {{-- <div class="col-md-6 col-xl-4 mg-t-10">
            <div class="card ht-100p">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h6 class="mg-b-0">New Customers</h6>
                    <div class="d-flex align-items-center tx-18">
                        <a href="" class="link-03 lh-0"><i class="icon ion-md-refresh"></i></a>
                        <a href="" class="link-03 lh-0 mg-l-10"><i class="icon ion-md-more"></i></a>
                    </div>
                </div>
                <ul class="list-group list-group-flush tx-13">
                    <li class="list-group-item d-flex pd-sm-x-20">
                        <div class="avatar"><span class="avatar-initial rounded-circle bg-gray-600">s</span></div>
                        <div class="pd-l-10">
                            <p class="tx-medium mg-b-0">Socrates Itumay</p>
                            <small class="tx-12 tx-color-03 mg-b-0">Customer ID#00222</small>
                        </div>
                        <div class="mg-l-auto d-flex align-self-center">
                            <nav class="nav nav-icon-only">
                                <a href="" class="nav-link d-none d-sm-block"><i data-feather="mail"></i></a>
                                <a href="" class="nav-link d-none d-sm-block"><i data-feather="slash"></i></a>
                                <a href="" class="nav-link d-none d-sm-block"><i data-feather="user"></i></a>
                                <a href="" class="nav-link d-sm-none"><i data-feather="more-vertical"></i></a>
                            </nav>
                        </div>
                    </li>
                    <li class="list-group-item d-flex pd-x-20">
                        <div class="avatar"><img src="https://via.placeholder.com/500" class="rounded-circle"
                                alt=""></div>
                        <div class="pd-l-10">
                            <p class="tx-medium mg-b-0">Reynante Labares</p>
                            <small class="tx-12 tx-color-03 mg-b-0">Customer ID#00221</small>
                        </div>
                        <div class="mg-l-auto d-flex align-self-center">
                            <nav class="nav nav-icon-only">
                                <a href="" class="nav-link d-none d-sm-block"><i data-feather="mail"></i></a>
                                <a href="" class="nav-link d-none d-sm-block"><i data-feather="slash"></i></a>
                                <a href="" class="nav-link d-none d-sm-block"><i data-feather="user"></i></a>
                                <a href="" class="nav-link d-sm-none"><i data-feather="more-vertical"></i></a>
                            </nav>
                        </div>
                    </li>
                    <li class="list-group-item d-flex pd-x-20">
                        <div class="avatar"><img src="https://via.placeholder.com/500" class="rounded-circle"
                                alt=""></div>
                        <div class="pd-l-10">
                            <p class="tx-medium mg-b-0">Marianne Audrey</p>
                            <small class="tx-12 tx-color-03 mg-b-0">Customer ID#00220</small>
                        </div>
                        <div class="mg-l-auto d-flex align-self-center">
                            <nav class="nav nav-icon-only">
                                <a href="" class="nav-link d-none d-sm-block"><i data-feather="mail"></i></a>
                                <a href="" class="nav-link d-none d-sm-block"><i data-feather="slash"></i></a>
                                <a href="" class="nav-link d-none d-sm-block"><i data-feather="user"></i></a>
                                <a href="" class="nav-link d-sm-none"><i data-feather="more-vertical"></i></a>
                            </nav>
                        </div>
                    </li>
                    <li class="list-group-item d-flex pd-x-20">
                        <div class="avatar"><span class="avatar-initial rounded-circle bg-indigo op-5">o</span></div>
                        <div class="pd-l-10">
                            <p class="tx-medium mg-b-0">Owen Bongcaras</p>
                            <small class="tx-12 tx-color-03 mg-b-0">Customer ID#00219</small>
                        </div>
                        <div class="mg-l-auto d-flex align-self-center">
                            <nav class="nav nav-icon-only">
                                <a href="" class="nav-link d-none d-sm-block"><i data-feather="mail"></i></a>
                                <a href="" class="nav-link d-none d-sm-block"><i data-feather="slash"></i></a>
                                <a href="" class="nav-link d-none d-sm-block"><i data-feather="user"></i></a>
                                <a href="" class="nav-link d-sm-none"><i data-feather="more-vertical"></i></a>
                            </nav>
                        </div>
                    </li>
                    <li class="list-group-item d-flex pd-x-20">
                        <div class="avatar"><span class="avatar-initial rounded-circle bg-primary op-5">k</span></div>
                        <div class="pd-l-10">
                            <p class="tx-medium mg-b-0">Kirby Avendula</p>
                            <small class="tx-12 tx-color-03 mg-b-0">Customer ID#00218</small>
                        </div>
                        <div class="mg-l-auto d-flex align-self-center">
                            <nav class="nav nav-icon-only">
                                <a href="" class="nav-link d-none d-sm-block"><i data-feather="mail"></i></a>
                                <a href="" class="nav-link d-none d-sm-block"><i data-feather="slash"></i></a>
                                <a href="" class="nav-link d-none d-sm-block"><i data-feather="user"></i></a>
                                <a href="" class="nav-link d-sm-none"><i data-feather="more-vertical"></i></a>
                            </nav>
                        </div>
                    </li>
                </ul>
                <div class="card-footer text-center tx-13">
                    <a href="" class="link-03">View More Customers <i
                            class="icon ion-md-arrow-down mg-l-5"></i></a>
                </div><!-- card-footer -->
            </div><!-- card -->
        </div> --}}
        {{-- <div class="col-md-6 col-xl-8 mg-t-10">
            <div class="card ht-100p">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h6 class="mg-b-0">New Customers</h6>
                    <div class="d-flex align-items-center tx-18">
                        <a href="" class="link-03 lh-0"><i class="icon ion-md-refresh"></i></a>
                        <a href="" class="link-03 lh-0 mg-l-10"><i class="icon ion-md-more"></i></a>
                    </div>
                </div>
                <div class="card-boody">
                    <div class="table-responsive">
                        <table id="viewdata" class="table table-bordered tx-9 table-hover">
                            <thead class="thead-primary">
                                <tr>
                                    <th>Competency</th>
                                    <th>Level</th>
                                    <th>Item ID</th>
                                    <th>Item Name</th>
                                    <th>Intervention</th>
                                    <th>Type Training</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($listItem as $vListItem)
                                    <tr>
                                        <td>{{ $vListItem->competency_name }}</td>
                                        <td>{{ $vListItem->level }}</td>
                                        <td>{{ $vListItem->item_name }}</td>
                                        <td>{{ $vListItem->item_id }}</td>
                                        <td>{{ $vListItem->intervention }}</td>
                                        <td>{{ $vListItem->type_training }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer text-center tx-13">
                    <a href="" class="link-03">View More Customers <i
                            class="icon ion-md-arrow-down mg-l-5"></i></a>
                </div><!-- card-footer -->
            </div><!-- card -->
        </div> --}}


    </div>
    <script src="/lib/jquery/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
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
                color: '#46C2CB'
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
                        strokeWidth: '67%',
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
@endsection
