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
        <div class="d-none d-md-block">
            {{-- <a href="/assessmentValidationDepartment" class="btn btn-sm pd-x-15 btn-danger btn-uppercase mg-l-5">
                <i data-feather="corner-down-left" class="wd-10 mg-r-5"></i>
                back
            </a> --}}
        </div>
    </div>

    <div class="row row-xs mg-b-30">
        @foreach ($status as $vStatus)
            @php
                $kd_assessment = $vStatus->id;
                $jobcode = $vStatus->jobcode;
                if ($vStatus->status == 1) {
                    $person = 'active';
                    $superior = '';
                    $completed = '';
                } elseif ($vStatus->status == 2) {
                    $person = 'complete';
                    $superior = 'active';
                    $completed = '';
                } else {
                    $person = 'complete';
                    $superior = 'complete';
                    $completed = 'complete';
                }

            @endphp
        @endforeach

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

                <div class="card" style="height: 190px;">
                    <div class="card-body pd-b-0">
                        <label class="tx-bold tx-success tx-13 tx-uppercase">
                            {{-- {{ $vData->competency_name }} --}}
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


                    <div class="card-footer" style="">
                        <div class="row row-xs">
                            <div class="col-lg-6">
                                @if ($vStatus->status == 2)
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

    </div><!-- row -->
@endsection
