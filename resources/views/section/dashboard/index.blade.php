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

        <div class="col-lg-12">

            <div class="row row-xs">
                <div class="col-sm-6 col-lg-3">
                    <div class="card card-body tx-center"
                        style="border-right: 0; border-left: 3 solid; border-top: 0; border-bottom: 0;">
                        <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Total Team</h6>
                        <div class="tx-center">
                            <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1" id="subOrdinateCount">
                                {{-- {{ $subordinateCount }} --}}
                            </h3>
                        </div>
                    </div>
                </div><!-- col -->
                <div class="col-sm-6 col-lg-3 mg-t-10 mg-sm-t-0 tx-center">
                    <div class="card card-body" style="border-right: 0; border-left: 1; border-top: 0; border-bottom: 0;">
                        <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Total Item</h6>
                        <div class="tx-center">
                            <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1" id="sumItem">
                                {{-- {{ number_format($sumItem) }} --}}
                            </h3>
                        </div>
                    </div>
                </div><!-- col -->
                <div class="col-sm-6 col-lg-3 mg-t-10 mg-lg-t-0 tx-center">
                    <div class="card card-body" style="border-right: 0; border-left: 1; border-top: 0; border-bottom: 0;">
                        <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Total ALDP</h6>
                        <div class="tx-center">
                            <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1">1</h3>
                        </div>
                    </div>
                </div><!-- col -->
                <div class="col-sm-6 col-lg-3 mg-t-10 mg-lg-t-0 tx-center">
                    <div class="card card-body" style="border-right: 0; border-left: 1; border-top: 0; border-bottom: 0;">
                        <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Total Employee Assessed
                        </h6>
                        <div class="tx-center">
                            <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1">2</h3>
                        </div>
                    </div>
                </div><!-- col -->
                <div class="col-lg-9 col-xl-9 mg-t-10">
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
                        <div class="card-body pos-relative pd-5">
                            <div class="row">
                                <div class="col-lg-12 col-xl-12">
                                    <div class="chart-one">
                                        <div id="chart"></div>
                                    </div><!-- chart-one -->
                                </div>

                            </div>


                        </div><!-- card-body -->
                    </div><!-- card -->
                </div>
                <div class="col-lg-3 col-xl-3 mg-t-10">
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
                                    <h4 class="tx-normal tx-rubik tx-spacing--1 mg-b-5" id="sumCompetent">
                                        {{-- {{ number_format($sumCompetent) }} --}}
                                    </h4>
                                    <p class="tx-9 tx-uppercase tx-spacing-1 tx-semibold mg-b-0 tx-primary">Competent</p>
                                </div><!-- col -->
                                <div class="col-sm mg-t-20 mg-sm-t-0 tx-center">
                                    <h4 class="tx-normal tx-rubik tx-spacing--1 mg-b-5" id="sumNeed">
                                        {{-- {{ number_format($sumNeed) }} --}}
                                    </h4>
                                    <p class="tx-9 tx-uppercase tx-spacing-0 tx-semibold mg-b-0 tx-pink">Need Improvement
                                    </p>
                                </div><!-- col -->
                            </div><!-- row -->
                        </div><!-- card-body -->
                    </div><!-- card -->
                </div>

            </div>
        </div>




    </div>

    @push('scripts')
        <script>
            $(document).ready(function() {
                $('#viewdata').DataTable();
            })

            const sumItem = document.getElementById('sumItem');
            const sumCompetent = document.getElementById('sumCompetent');
            const sumNeed = document.getElementById('sumNeed');
            const subOrdinateCount = document.getElementById('subOrdinateCount');
            // sumItem.setAttribute('class', 'spinner-border');
            // sumCompetent.setAttribute('class', 'spinner-border');
            // sumNeed.setAttribute('class', 'spinner-border');
            // subOrdinateCount.setAttribute('class', 'spinner-border');

            async function fetchDataCompetency() {
                try {
                    const response = await fetch('/api/datacompetency');

                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }

                    const data = await response.json();
                    return data;
                } catch (error) {
                    console.error('There was a problem with the fetch operation datacompetency:', error);
                    throw error; // Re-throw the error so it can be caught further up the call stack if needed
                }
            }
            async function getDataCompetency() {
                try {
                    const spinners = document.querySelectorAll('.spinner-border');
                    spinners.forEach(spinner => {
                        spinner.remove();
                    });

                    const data = await fetchDataCompetency();
                    console.log(data);
                    const sumItem = document.getElementById('sumItem');
                    const sumCompetent = document.getElementById('sumCompetent');
                    const sumNeed = document.getElementById('sumNeed');
                    const subOrdinateCount = document.getElementById('subOrdinateCount');

                    sumItem.innerHTML += data.sumItem;
                    sumCompetent.innerHTML += data.sumCompetent;
                    sumNeed.innerHTML += data.sumNeed;
                    subOrdinateCount.innerHTML += data.subCount;

                    makeChart(data.countCompetent, data.countNeed, data.getCompetency, data.percent)
                } catch (error) {
                    console.error('Error:', error);
                }
            }
            getDataCompetency()

            function makeChart(competent, need, competency, percent) {
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
                        data: competent,
                        color: '#46C2CB'
                    }, {
                        name: 'Need Improvement',
                        data: need,
                        color: '#FC5185'
                    }],
                    xaxis: {
                        categories: competency
                    }
                }

                var chart = new
                ApexCharts(document.querySelector("#chart"), options);
                chart.render();

                var config = {
                    series: [parseInt(percent)],
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
            }
        </script>
    @endpush
@endsection
