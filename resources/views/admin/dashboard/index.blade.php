@extends('layouts.main')

@section('body')
    <div class="content">
        <div class="container pd-x-0 pd-lg-x-10 pd-xl-x-0">
            <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
                <div>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            {{-- <li class="breadcrumb-item active" aria-current="page">Sales Monitoring</li> --}}
                        </ol>
                    </nav>
                    <h4 class="mg-b-0 tx-spacing--1">Welcome to Dashboard</h4>
                </div>
                {{-- <div class="d-none d-md-block">
                    <button class="btn btn-sm pd-x-15 btn-white btn-uppercase"><i data-feather="mail"
                            class="wd-10 mg-r-5"></i> Email</button>
                    <button class="btn btn-sm pd-x-15 btn-white btn-uppercase mg-l-5"><i data-feather="printer"
                            class="wd-10 mg-r-5"></i> Print</button>
                    <button class="btn btn-sm pd-x-15 btn-primary btn-uppercase mg-l-5"><i data-feather="file"
                            class="wd-10 mg-r-5"></i> Generate Report</button>
                </div> --}}
            </div>

            <div class="row row-xs">
                <div class="col-4 mg-t-10">
                    <div class="card">
                        <div class="col col-sm-12 col-lg">
                            <div class="pd-10">
                                <div class="media mg-b-0">

                                    <div class="crypto-icon bg-primary">
                                        <i data-feather="users"></i>
                                    </div><!-- crypto-icon -->

                                    <div class="media-body pd-l-8">
                                        <h6 class="tx-11 tx-spacing-1 tx-uppercase tx-semibold mg-b-5">Employees <span
                                                class="tx-color-03 tx-normal">(EMP)</span></h6>
                                        <div class="d-flex align-items-baseline tx-rubik">
                                            <a href="/employees" class="tx-20 mg-b-0">{{ number_format($employee) }}</a>
                                        </div>

                                    </div><!-- media-body -->
                                </div><!-- media -->

                            </div><!-- crypto -->
                        </div>
                    </div>
                </div>

                <div class="col-4 mg-t-10">
                    <div class="card">
                        <div class="col col-sm-12 col-lg">
                            <div class="pd-10">
                                <div class="media mg-b-0">

                                    <div class="crypto-icon bg-success">
                                        <i data-feather="briefcase"></i>
                                    </div><!-- crypto-icon -->

                                    <div class="media-body pd-l-8">
                                        <h6 class="tx-11 tx-spacing-1 tx-uppercase tx-semibold mg-b-5">Competency <span
                                                class="tx-color-03 tx-normal">(C)</span></h6>
                                        <div class="d-flex align-items-baseline tx-rubik">
                                            <a href="/competency"
                                                class="tx-20 mg-b-0">{{ number_format($competencies) }}</a>
                                        </div>

                                    </div><!-- media-body -->
                                </div><!-- media -->

                            </div><!-- crypto -->
                        </div>
                    </div>
                </div>

                <div class="col-4 mg-t-10">
                    <div class="card">
                        <div class="col col-sm-12 col-lg">
                            <div class="pd-10">
                                <div class="media mg-b-0">

                                    <div class="crypto-icon bg-success">
                                        <i data-feather="award"></i>
                                    </div><!-- crypto-icon -->

                                    <div class="media-body pd-l-8">
                                        <h6 class="tx-11 tx-spacing-1 tx-uppercase tx-semibold mg-b-5">Performance Standard
                                            <span class="tx-color-03 tx-normal">(PS)</span>
                                        </h6>
                                        <div class="d-flex align-items-baseline tx-rubik">
                                            <a href="/performance"
                                                class="tx-20 mg-b-0">{{ number_format($performance_standards) }}</a>
                                        </div>

                                    </div><!-- media-body -->
                                </div><!-- media -->

                            </div><!-- crypto -->
                        </div>
                    </div>
                </div>

                <div class="col-4 mg-t-10">
                    <div class="card">
                        <div class="col col-sm-12 col-lg">
                            <div class="pd-10">
                                <div class="media mg-b-0">

                                    <div class="crypto-icon bg-success">
                                        <i data-feather="list"></i>
                                    </div><!-- crypto-icon -->

                                    <div class="media-body pd-l-8">
                                        <h6 class="tx-11 tx-spacing-1 tx-uppercase tx-semibold mg-b-5">Learning Items <span
                                                class="tx-color-03 tx-normal">(LI)</span></h6>
                                        <div class="d-flex align-items-baseline tx-rubik">
                                            <a href="/items" class="tx-20 mg-b-0">{{ number_format($items) }}</a>
                                        </div>

                                    </div><!-- media-body -->
                                </div><!-- media -->

                            </div><!-- crypto -->
                        </div>
                    </div>
                </div>
                <div class="col-4 mg-t-10">
                    <div class="card">
                        <div class="col col-sm-12 col-lg">
                            <div class="pd-10">
                                <div class="media mg-b-0">

                                    <div class="crypto-icon bg-success">
                                        <i data-feather="list"></i>
                                    </div><!-- crypto-icon -->

                                    <div class="media-body pd-l-8">
                                        <h6 class="tx-11 tx-spacing-1 tx-uppercase tx-semibold mg-b-5">Profile Matrix <span
                                                class="tx-color-03 tx-normal">(LI)</span></h6>
                                        <div class="d-flex align-items-baseline tx-rubik">
                                            <a href="/items" class="tx-20 mg-b-0">{{ number_format($matrix) }}</a>
                                        </div>

                                    </div><!-- media-body -->
                                </div><!-- media -->

                            </div><!-- crypto -->
                        </div>
                    </div>
                </div>
                <div class="col-4 mg-t-10">
                    <div class="card">
                        <div class="col col-sm-12 col-lg">
                            <div class="pd-10">
                                <div class="media mg-b-0">

                                    <div class="crypto-icon bg-pink">
                                        <i data-feather="check-circle"></i>
                                    </div><!-- crypto-icon -->

                                    <div class="media-body pd-l-8">
                                        <h6 class="tx-11 tx-spacing-1 tx-uppercase tx-semibold mg-b-5">Assessments <span
                                                class="tx-color-03 tx-normal">(AS)</span></h6>
                                        <div class="d-flex align-items-baseline tx-rubik">
                                            <a href="/assessmentAdmin"
                                                class="tx-20 mg-b-0">{{ number_format($assessment) }}</a>
                                        </div>

                                    </div><!-- media-body -->
                                </div><!-- media -->

                            </div><!-- crypto -->
                        </div>
                    </div>
                </div>
                <div class="col-4 mg-t-10">
                    <div class="card">
                        <div class="col col-sm-12 col-lg">
                            <div class="pd-10">
                                <div class="media mg-b-0">

                                    <div class="crypto-icon bg-pink">
                                        <i data-feather="calendar"></i>
                                    </div><!-- crypto-icon -->

                                    <div class="media-body pd-l-8">
                                        <h6 class="tx-11 tx-spacing-1 tx-uppercase tx-semibold mg-b-5">Annual Learning
                                            Dev Plan <span class="tx-color-03 tx-normal">(ALDP)</span></h6>
                                        <div class="d-flex align-items-baseline tx-rubik">
                                            <a href="/aldpAdmin" class="tx-20 mg-b-0">{{ number_format($aldp) }}</a>
                                        </div>

                                    </div><!-- media-body -->
                                </div><!-- media -->

                            </div><!-- crypto -->
                        </div>
                    </div>
                </div>
                <div class="col-4 mg-t-10">
                    <div class="card">
                        <div class="col col-sm-12 col-lg">
                            <div class="pd-10">
                                <div class="media mg-b-0">

                                    <div class="crypto-icon bg-pink">
                                        <i data-feather="camera"></i>
                                    </div><!-- crypto-icon -->

                                    <div class="media-body pd-l-8">
                                        <h6 class="tx-11 tx-spacing-1 tx-uppercase tx-semibold mg-b-5">Close Gap Activity
                                            <span class="tx-color-03 tx-normal">(CGA)</span>
                                        </h6>
                                        <div class="d-flex align-items-baseline tx-rubik">
                                            <a href="/closegap"
                                                class="tx-20 mg-b-0">{{ number_format($closegap_activity) }}</a>
                                        </div>

                                    </div><!-- media-body -->
                                </div><!-- media -->

                            </div><!-- crypto -->
                        </div>
                    </div>
                </div>



            </div>

        </div><!-- container -->
    </div><!-- content -->
@endsection
