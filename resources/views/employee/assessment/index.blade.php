@extends('layouts.main')

@section('body')
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
        {{-- <div class="d-none d-md-block">
            <button class="btn btn-sm pd-x-15 btn-white btn-uppercase mg-l-5">
                <i data-feather="share" class="wd-10 mg-r-5"></i>
                Upload Data
            </button>
            <a href="/competency/create" class="btn btn-sm pd-x-15 btn-primary btn-uppercase mg-l-5">
                <i data-feather="file" class="wd-10 mg-r-5"></i>
                Add New Data
            </a>
        </div> --}}
    </div>
    @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <div class="row row-xs">



        @foreach ($data as $vData)
            <div class="col-sm-6 col-lg-4 mg-t-10">
                <div class="card shadow-sm mb-03">
                    <div class="card-body pd-x-20 pd-b-10">
                        <p class="tx-10 tx-spacing-1 tx-color-03 tx-medium mg-b-5">Form Assessment Functional Competency</p>
                        <h3 class="tx-18 tx-normal tx-rubik tx-spacing--2 mg-b-5">{{ $vData->employee_name }}</h3>

                        <div class="d-flex mg-b-10">
                            <p class="tx-10 tx-rubik mg-b-0">
                                <span class="tx-medium tx-color-03 mg-r-5">
                                    ID :
                                </span> {{ $vData->employee_id }}
                            </p>
                            <p class="tx-10 tx-rubik mg-b-0 mg-l-10">
                                <span class="tx-medium tx-color-03 mg-r-5">
                                    Position :
                                </span>{{ $vData->position }}
                            </p>
                        </div>

                        <div class="d-flex mg-b-5">
                            <span class="badge badge-pill badge-dark mg-r-5 tx-12">{{ $vData->year }}</span>

                            @if ($vData->status == 1)
                                <span class="badge badge-pill badge-dark mg-r-5 tx-12">Self Assessment</span>
                            @elseif($vData->status == 2)
                                <span class="badge badge-pill badge-warning mg-r-5 tx-12">Review by superior</span>
                            @else
                                <span class="badge badge-pill badge-success mg-r-5 tx-12">Completed</span>
                            @endif

                        </div>


                    </div><!-- card-body -->

                    @php
                        if ($vData->status == 1) {
                            $disable = '';
                        } else {
                            $disable = 'disabled="disabled"';
                        }
                    @endphp
                    <div class="card-footer tx-13 bg-dark">
                        <div class="row row-xs">
                            <div class="col-lg-6">
                                <a href="/assessmentEmployee/{{ $vData->id }}"
                                    class="btn btn-xs btn-outline-warning btn-block">
                                    Form Assessment
                                </a>
                            </div>
                            <div class="col-lg-6">
                                <form action="/finishForm" method="POST" onclick="return confirm('Are you sure?')">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $vData->id }}">
                                    <button type="submit" class="btn btn-xs btn-outline-secondary btn-block"
                                        {{ $disable }}>Finish
                                        Form</button>
                                </form>
                            </div>
                        </div>


                    </div>
                </div><!-- card -->
            </div><!-- col -->
        @endforeach

    </div>
@endsection
