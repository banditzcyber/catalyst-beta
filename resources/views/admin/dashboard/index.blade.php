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

            <div class="row row-xs mg-b-40">
                <div class="col-lg-4 mg-t-10">
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

                <div class="col-lg-4 mg-t-10">
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

                <div class="col-lg-4 mg-t-10">
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

                <div class="col-lg-4 mg-t-10">
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
                <div class="col-lg-4 mg-t-10">
                    <div class="card">
                        <div class="col col-sm-12 col-lg">
                            <div class="pd-10">
                                <div class="media mg-b-0">

                                    <div class="crypto-icon bg-success">
                                        <i data-feather="activity"></i>
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
                <div class="col-lg-4 mg-t-10">
                    <div class="card">
                        <div class="col col-sm-12 col-lg">
                            <div class="pd-10">
                                <div class="media mg-b-0">

                                    <div class="crypto-icon bg-pink">
                                        <i data-feather="user"></i>
                                    </div><!-- crypto-icon -->

                                    <div class="media-body pd-l-8">
                                        <h6 class="tx-11 tx-spacing-1 tx-uppercase tx-semibold mg-b-5">User Login <span
                                                class="tx-color-03 tx-normal">(UL)</span></h6>
                                        <div class="d-flex align-items-baseline tx-rubik">
                                            <a href="/aldpAdmin" class="tx-20 mg-b-0">{{ number_format($users) }}</a>
                                        </div>

                                    </div><!-- media-body -->
                                </div><!-- media -->

                            </div><!-- crypto -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mg-t-10">
                    <div class="card">
                        <div class="col col-sm-12 col-lg">
                            <div class="pd-10">
                                <div class="media mg-b-0">

                                    <div class="crypto-icon bg-purple">
                                        <i data-feather="tag"></i>
                                    </div><!-- crypto-icon -->

                                    <div class="media-body pd-l-8">
                                        <h6 class="tx-11 tx-spacing-1 tx-uppercase tx-semibold mg-b-5">Visitor <span
                                                class="tx-color-03 tx-normal">(V)</span></h6>
                                        <div class="d-flex align-items-baseline tx-rubik">
                                            <a href="/aldpAdmin" class="tx-20 mg-b-0">{{ number_format($visitor) }}</a>
                                        </div>

                                    </div><!-- media-body -->
                                </div><!-- media -->

                            </div><!-- crypto -->
                        </div>
                    </div>
                </div>
            </div>

            <hr class="mg-b-30">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                    <li class="breadcrumb-item">Assessment Items</li>
                </ol>
            </nav>

            <div class="row row-xs mg-b-40">

                <div class="col-lg-3 mg-t-10">
                    <div class="card">
                        <div class="col col-sm-12 col-lg">
                            <div class="pd-10">
                                <div class="media mg-b-0">

                                    <div class="crypto-icon bg-info">
                                        <i data-feather="file-text"></i>
                                    </div><!-- crypto-icon -->

                                    <div class="media-body pd-l-8">
                                        <h6 class="tx-11 tx-spacing-1 tx-uppercase tx-semibold mg-b-5">Total Form <span
                                                class="tx-color-03 tx-normal">(TI)</span></h6>
                                        <div class="d-flex align-items-baseline tx-rubik">
                                            <a href="/employees" class="tx-20 mg-b-0">{{ number_format($assessment) }}</a>
                                        </div>

                                    </div><!-- media-body -->
                                </div><!-- media -->

                            </div><!-- crypto -->
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 mg-t-10">
                    <div class="card">
                        <div class="col col-sm-12 col-lg">
                            <div class="pd-10">
                                <div class="media mg-b-0">

                                    <div class="crypto-icon bg-primary">
                                        <i data-feather="target"></i>
                                    </div><!-- crypto-icon -->

                                    <div class="media-body pd-l-8">
                                        <h6 class="tx-11 tx-spacing-1 tx-uppercase tx-semibold mg-b-5">Total Item <span
                                                class="tx-color-03 tx-normal">(TI)</span></h6>
                                        <div class="d-flex align-items-baseline tx-rubik">
                                            <a href="/employees"
                                                class="tx-20 mg-b-0">{{ number_format($itemAssessment) }}</a>
                                        </div>

                                    </div><!-- media-body -->
                                </div><!-- media -->

                            </div><!-- crypto -->
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 mg-t-10">
                    <div class="card">
                        <div class="col col-sm-12 col-lg">
                            <div class="pd-10">
                                <div class="media mg-b-0">

                                    <div class="crypto-icon bg-success">
                                        <i data-feather="plus-circle"></i>
                                    </div><!-- crypto-icon -->

                                    <div class="media-body pd-l-8">
                                        <h6 class="tx-11 tx-spacing-1 tx-uppercase tx-semibold mg-b-5">Competent <span
                                                class="tx-color-03 tx-normal">(IC)</span></h6>
                                        <div class="d-flex align-items-baseline tx-rubik">
                                            <a href="/competency"
                                                class="tx-20 mg-b-0">{{ number_format($itemCompetent) }}</a>
                                        </div>

                                    </div><!-- media-body -->
                                </div><!-- media -->

                            </div><!-- crypto -->
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 mg-t-10">
                    <div class="card">
                        <div class="col col-sm-12 col-lg">
                            <div class="pd-10">
                                <div class="media mg-b-0">

                                    <div class="crypto-icon bg-warning">
                                        <i data-feather="minus-circle"></i>
                                    </div><!-- crypto-icon -->

                                    <div class="media-body pd-l-8">
                                        <h6 class="tx-11 tx-spacing-1 tx-uppercase tx-semibold mg-b-5">Need
                                            Improve
                                            <span class="tx-color-03 tx-normal">(NI)</span>
                                        </h6>
                                        <div class="d-flex align-items-baseline tx-rubik">
                                            <a href="/performance"
                                                class="tx-20 mg-b-0">{{ number_format($itemNeedImprovement) }}</a>
                                        </div>

                                    </div><!-- media-body -->
                                </div><!-- media -->

                            </div><!-- crypto -->
                        </div>
                    </div>
                </div>
            </div>

            <hr class="mg-b-30">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                    <li class="breadcrumb-item">Annual Learning Development Plan</li>
                </ol>
            </nav>
            <div class="row row-xs mg-b-40">

                <div class="col-lg-3 mg-t-10">
                    <div class="card">
                        <div class="col col-sm-12 col-lg">
                            <div class="pd-10">
                                <div class="media mg-b-0">

                                    <div class="crypto-icon bg-info">
                                        <i data-feather="file-text"></i>
                                    </div><!-- crypto-icon -->

                                    <div class="media-body pd-l-8">
                                        <h6 class="tx-11 tx-spacing-1 tx-uppercase tx-semibold mg-b-5">Total Form <span
                                                class="tx-color-03 tx-normal">(TI)</span></h6>
                                        <div class="d-flex align-items-baseline tx-rubik">
                                            <a href="/employees" class="tx-20 mg-b-0">{{ number_format($formAldp) }}</a>
                                        </div>

                                    </div><!-- media-body -->
                                </div><!-- media -->

                            </div><!-- crypto -->
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 mg-t-10">
                    <div class="card">
                        <div class="col col-sm-12 col-lg">
                            <div class="pd-10">
                                <div class="media mg-b-0">

                                    <div class="crypto-icon bg-primary">
                                        <i data-feather="calendar"></i>
                                    </div><!-- crypto-icon -->

                                    <div class="media-body pd-l-8">
                                        <h6 class="tx-11 tx-spacing-1 tx-uppercase tx-semibold mg-b-5">Learnings
                                            <span class="tx-color-03 tx-normal">(TL)</span>
                                        </h6>
                                        <div class="d-flex align-items-baseline tx-rubik">
                                            <a href="/employees" class="tx-20 mg-b-0">{{ number_format($itemAldp) }}</a>
                                        </div>

                                    </div><!-- media-body -->
                                </div><!-- media -->

                            </div><!-- crypto -->
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 mg-t-10">
                    <div class="card">
                        <div class="col col-sm-12 col-lg">
                            <div class="pd-10">
                                <div class="media mg-b-0">

                                    <div class="crypto-icon bg-success">
                                        <i data-feather="plus-circle"></i>
                                    </div><!-- crypto-icon -->

                                    <div class="media-body pd-l-8">
                                        <h6 class="tx-11 tx-spacing-1 tx-uppercase tx-semibold mg-b-5">Participant <span
                                                class="tx-color-03 tx-normal">(P)</span></h6>
                                        <div class="d-flex align-items-baseline tx-rubik">
                                            <a href="/competency"
                                                class="tx-20 mg-b-0">{{ number_format($participantAldp) }}</a>
                                        </div>

                                    </div><!-- media-body -->
                                </div><!-- media -->

                            </div><!-- crypto -->
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 mg-t-10">
                    <div class="card">
                        <div class="col col-sm-12 col-lg">
                            <div class="pd-10">
                                <div class="media mg-b-0">

                                    <div class="crypto-icon bg-warning">
                                        {{-- <i data-feather="minus-circle"></i> --}}
                                        %
                                    </div><!-- crypto-icon -->

                                    <div class="media-body pd-l-8">
                                        <h6 class="tx-11 tx-spacing-1 tx-uppercase tx-semibold mg-b-5">Progress
                                            <span class="tx-color-03 tx-normal">(INI)</span>
                                        </h6>
                                        <div class="d-flex align-items-baseline tx-rubik">
                                            <a href="/performance" class="tx-20 mg-b-0">{{ number_format($percentAldp) }}
                                                %</a>
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
