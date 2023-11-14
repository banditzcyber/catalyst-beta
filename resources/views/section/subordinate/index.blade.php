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
            <h4 class="mg-b-0 tx-spacing--1">{{ $title }}</h4>
        </div>
        <div class="d-none d-md-block">
            {{-- <button class="btn btn-sm pd-x-15 btn-white btn-uppercase mg-l-5">
                <i data-feather="share" class="wd-10 mg-r-5"></i>
                Upload Data
            </button>
            <a href="/competency/create" class="btn btn-sm pd-x-15 btn-primary btn-uppercase mg-l-5">
                <i data-feather="file" class="wd-10 mg-r-5"></i>
                Add New Data
            </a> --}}
        </div>
    </div>

    <div class="container">
        <div class="row row-xs mg-b-25">

            @foreach ($data as $view)
                <div class="col-sm-4 col-md-2 col-lg-4 col-xl-2 mg-b-10">
                    <div class="card card-profile" style="height: 270px">
                        <img src="/images/bg-content.jpg" class="card-img-top" alt="">
                        <div class="card-body tx-center">
                            <div>
                                <a href="">
                                    <div class="avatar avatar-lg">
                                        <img src="/images/i-user.jpg" class="rounded-circle" alt="">
                                    </div>
                                </a>
                                <label
                                    class="tx-13 pd-t-15 pd-b-0 tx-bold">{{ Str::limit($view->employee_name, 15) }}</label>
                                <p class="tx-9">{{ Str::limit($view->position, 27) }}</p>
                                <a href="/subordinate/profile/{{ $view->employee_id }}"
                                    class="btn btn-block btn-xs btn-white">View</a>
                            </div>
                        </div>
                    </div><!-- card -->
                </div><!-- col -->
            @endforeach
        </div><!-- row -->
    </div>
@endsection
