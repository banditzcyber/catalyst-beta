@extends('layouts.main')

@section('body')
    <div class="mg-t-0 mg-b-5 pd-0">
        <img src="/images/cap/bnr.jpg" alt="">
    </div>
    <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">

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
                                <span class="badge badge-pill badge-danger mg-r-5 tx-12">Self Assessment</span>
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

                        <a href="/assessmentEmployee/{{ $vData->id }}" class="btn btn-xs btn-outline-warning">
                            Form
                        </a>
                    </div>
                </div><!-- card -->
            </div><!-- col -->
        @endforeach

    </div>
@endsection
