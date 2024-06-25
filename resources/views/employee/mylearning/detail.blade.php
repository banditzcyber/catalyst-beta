@extends('layouts.main') @section('body')
    <div class="mg-t-0 mg-b-5 pd-0">
        <img src="/images/cap/bnr2.jpg" alt="">
    </div>
    <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
        <div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                    <li class="breadcrumb-item">
                        <a href="#">{{ $title }}</a>
                    </li>
                </ol>
            </nav>
            <h4 class="mg-b-0 tx-spacing--1">{{ $title }}</h4>
        </div>
        <div class="d-none d-md-block">
            <a href="/mylearning" class="btn btn-sm pd-x-15 btn-danger btn-uppercase mg-l-5">
                <i data-feather="corner-down-left" class="wd-10 mg-r-5"></i>
                back
            </a>
        </div>
    </div>

    <div class="col-md-8">
        @foreach ($data2 as $view)
            <div class="card card-body mg-b-10">
                <div class="row row-xs">
                    <div class="col-md-6">
                        <h6 class="mg-b-0 tx-10">Competency</h6>
                        <p class="tx-12 tx-color-03 mg-b-10">{{ $view->competency_name }}</p>

                        <h6 class="mg-b-0 tx-10">Performance Standards</h6>
                        <p class="tx-12 tx-color-03 mg-b-10">{{ $view->ps_name }}</p>

                        <h6 class="mg-b-0 tx-10">Level</h6>
                        <p class="tx-12 tx-color-03 mg-b-0">{{ $view->level }}</p>

                        <h6 class="mg-b-0 tx-10">Evidence</h6>
                        <p class="tx-12 tx-color-03 mg-b-0">
                            <a href="{{ asset('storage/' . $view->evidence) }}" target="_blank">
                                Evidence
                            </a>
                        </p>

                    </div>
                    <div class="col-md-5 mg-l-5">
                        <h6 class="mg-b-0 tx-10">Item ID</h6>
                        <p class="tx-12 tx-color-03 mg-b-10">{{ $view->item_id }}</p>

                        <h6 class="mg-b-0 tx-10">Leanring Items</h6>
                        <p class="tx-12 tx-color-03 mg-b-10">{{ $view->item_name }}</p>

                        <h6 class="mg-b-0 tx-10">Intervention</h6>
                        <p class="tx-12 tx-color-03 mg-b-10">{{ $view->intervention }}</p>

                        <h6 class="mg-b-0 tx-10">Type Training</h6>
                        <p class="tx-12 tx-color-03 mg-b-10">{{ $view->type_training }}</p>

                        <h6 class="mg-b-0 tx-10">Date</h6>
                        <p class="tx-12 tx-color-03 mg-b-0">{{ $view->started_at }} s.d {{ $view->finished_at }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    @push('scripts')
    @endpush
@endsection
