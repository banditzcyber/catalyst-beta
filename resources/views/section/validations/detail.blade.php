@extends('layouts.main')

@section('body')
    <div class="mg-t-0 mg-b-5 pd-0">

        <img src="/images/cap/bnr4.jpg" alt="" class="bg-banner">
    </div>
    <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30 mg-t-20">
        <div>
            <h5 class="mg-b-0 tx-spacing--1">{{ $employee_name }} ({{ $employee_id }})</h5>
        </div>
        <div class="d-none d-md-block">
            {{-- <div class="row row-xs pd-0">
                <div class="btn-group" role="group" aria-label="Basic example">
                    <form action="/finishFormValidation" method="POST">
                        @csrf
                        <input type="hidden" name="assessment_id" value="{{ $id }}">
                        <button type="submit" class="btn btn-sm pd-x-15 btn-dark btn-uppercase">
                            <i data-feather="save" class="wd-10 mg-r-5"></i>
                            Finish Form</button>
                    </form>
                    <a href="/assessmentValidation" class="btn btn-sm pd-x-15 btn-danger btn-uppercase">
                        <i data-feather="corner-down-left" class="wd-10 mg-r-5"></i>
                        back
                    </a>
                    <form action="/returnForm" method="POST">
                        @csrf
                        <input type="hidden" name="assessment_id" value="{{ $id }}">
                        <button type="submit" class="btn btn-sm pd-x-15 btn-warning btn-uppercase">
                            <i data-feather="corner-down-right" class="wd-10 mg-r-5"></i>
                            Returned</button>
                    </form>
                </div>

            </div> --}}

        </div>
    </div>

    <div class="row row-xs mg-b-30">

        @php

            if ($status == 1) {
                $person = 'active';
                $superior = '';
                $completed = '';
            } elseif ($status == 2) {
                $person = 'complete';
                $superior = 'active';
                $completed = '';
            } else {
                $person = 'complete';
                $superior = 'complete';
                $completed = 'complete';
            }

        @endphp

        <ul class="steps">
            <li class="step-item <?= $person ?>">
                <a href="" class="step-link">
                    <span class="step-icon"><i data-feather="user"></i></span>
                    <div>
                        <span class="step-title">Self Assessment</span>
                        <span class="step-desc">Employee Assessment.</span>
                    </div>
                </a>
            </li>
            <li class="step-item <?= $superior ?>">
                <a href="" class="step-link">
                    <span class="step-icon"><i data-feather="repeat"></i></span>
                    <div>
                        <span class="step-title">Superiors Review</span>
                        <span class="step-desc">Superiors review the assessment results</span>
                    </div>
                </a>
            </li>
            <li class="step-item <?= $completed ?>">
                <a href="" class="step-link">
                    <span class="step-icon"><i data-feather="check-circle"></i></span>
                    <div>
                        <span class="step-title">Completed</span>
                        <span class="step-desc">the assessment process has been completed.</span>
                    </div>
                </a>
            </li>
        </ul>

    </div>

    @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="row row-xs">

        @foreach ($data as $vData)
            <div class="col-sm-6 col-lg-3 mg-t-10">

                <div class="card card-cyber">
                    <div class="card-body pd-b-0">
                        <label class="tx-bold tx-success tx-13 tx-uppercase">
                            {{ str_word_count($vData->competency_name) > 3 ? substr($vData->competency_name, 0, 27) . ' [...]' : $vData->competency_name }}
                        </label>

                        <label class="tx-10 tx-italic">
                            {{ str_word_count($vData->description) > 30 ? substr($vData->description, 0, 230) . ' [...]' : $vData->description }}
                            <label>
                    </div>

                    @php
                        $dValid = DB::table('assessment_details')
                            ->join('items', 'assessment_details.item_id', '=', 'items.item_id')
                            ->join('performance_standards', 'items.ps_id', '=', 'performance_standards.ps_id')
                            ->join(
                                'competencies',
                                'performance_standards.competency_id',
                                '=',
                                'competencies.competency_id',
                            )
                            ->where('assessment_details.assessment_id', '=', $id)
                            ->where('competencies.competency_id', '=', $vData->competency_id)
                            ->count();
                    @endphp


                    <div class="card-footer">
                        <div class="row row-xs">
                            <div class="col-lg-6">
                                @if ($status == 2)
                                    @if ($dValid == 0)
                                        {{-- <a href="/sig/edit/{$value->id}/{$value->ticketid}" title="Edit signature"> --}}
                                        <a href="/formassessment/{{ $vData->competency_id }}/{{ $kd_assessment }}/{{ $jobcode }}"
                                            class="btn btn-xs btn-outline-secondary">Start</a>
                                    @else
                                        <a href="/reviewAssessment/{{ $vData->competency_id }}/{{ $kd_assessment }}/{{ $jobcode }}"
                                            class="btn btn-xs btn-outline-secondary">Review</a>
                                    @endif
                                @else
                                    <a href="/resultAssessment/{{ $vData->competency_id }}/{{ $kd_assessment }}/{{ $jobcode }}"
                                        class="btn btn-xs btn-outline-secondary">View</a>
                                @endif
                            </div>
                            <div class="col-lg-6 tx-right">

                            </div>
                        </div>

                    </div>
                </div>

            </div>
        @endforeach

        @php
            if ($status == 2) {
                $btnFinish = '';
                $btnReturn = '';
            } else {
                $btnFinish = 'disabled';
                $btnReturn = 'disabled';
            }
        @endphp

        <div class="row row-xs pd-0 mg-t-20">
            <div class="btn-group" role="group" aria-label="Basic example">
                <form action="/finishFormValidation" method="POST">
                    @csrf
                    <input type="hidden" name="assessment_id" value="{{ $id }}">
                    <button type="submit" class="btn btn-sm pd-x-15 btn-dark btn-uppercase" {{ $btnFinish }}>
                        <i data-feather="save" class="wd-10 mg-r-5"></i>
                        Finish Form</button>
                </form>
                <a href="/assessmentValidation" class="btn btn-sm pd-x-15 btn-danger btn-uppercase">
                    <i data-feather="corner-down-left" class="wd-10 mg-r-5"></i>
                    back
                </a>
                <form action="/returnForm" method="POST">
                    @csrf
                    <input type="hidden" name="assessment_id" value="{{ $id }}">
                    <button type="submit" class="btn btn-sm pd-x-15 btn-warning btn-uppercase" {{ $btnReturn }}>
                        <i data-feather="corner-down-right" class="wd-10 mg-r-5"></i>
                        Returned</button>
                </form>
            </div>

        </div>

    </div><!-- row -->
@endsection
