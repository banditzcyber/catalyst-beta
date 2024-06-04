@extends('layouts.main')

@section('body')
    <div class="mg-t-0 mg-b-5 pd-0">

        <img src="/images/cap/bnr.png" alt="">
    </div>
    <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
        <div>

        </div>
        <div class="d-none d-md-block">
            <div class="row row-xs pd-0" style="width: 250px">
                <div class="col-lg-7 pd-0">
                    <form action="/finishForm" method="POST" onclick="return confirm('Are you sure?')">
                        @csrf
                        <input type="hidden" name="id" value="{{ $id }}">
                        <button type="submit" class="btn btn-sm pd-x-15 btn-dark btn-uppercase">
                            <i data-feather="save" class="wd-10 mg-r-5"></i>
                            Finish Form</button>
                    </form>
                </div>
                <div class="col-lg-5 pd-0">
                    <a href="/assessmentEmployee" class="btn btn-sm pd-x-15 btn-danger btn-uppercase">
                        <i data-feather="corner-down-left" class="wd-10 mg-r-5"></i>
                        back
                    </a>
                </div>
            </div>
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

    <div class="row row-xs">

        @foreach ($data as $vData)
            <div class="col-sm-6 col-lg-3 mg-t-10">

                <div class="card" style="height: 190px;">
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

                        if ($vStatus->status == 1) {
                            if ($dValid == 0) {
                                $link =
                                    '/formassessment/' . $vData->competency_id . '/' . $kd_assessment . '/' . $jobcode;
                                $btn = 'btn-outline-secondary';
                                $title = 'Start';
                                $bg = 'bg-light';
                            } else {
                                $link =
                                    '/updateAssessment/' .
                                    $vData->competency_id .
                                    '/' .
                                    $kd_assessment .
                                    '/' .
                                    $jobcode;
                                $btn = 'btn-light';
                                $title = 'Update';
                                $bg = 'bg-success';
                            }
                        } else {
                            $link =
                                '/resultAssessment/' . $vData->competency_id . '/' . $kd_assessment . '/' . $jobcode;
                            $btn = 'btn-light';
                            $title = 'View';
                            $bg = 'bg-success';
                        }
                    @endphp


                    <div class="card-footer {{ $bg }}" style="">
                        <div class="row row-xs">
                            <div class="col-lg-6">


                                <a href="{{ $link }}" class="btn btn-xs {{ $btn }}">{{ $title }}</a>
                            </div>
                            <div class="col-lg-6 tx-right">

                            </div>
                        </div>

                    </div>
                </div>

            </div>
        @endforeach

    </div><!-- row -->

    </div><!-- container -->
    </div>


    <script>
        function refresh() {
            location.reload();
        }

        $(function() {
            'use strict'

            $('.img-caption').on('mouseover mouseout', function() {
                $(this).find('figcaption').toggleClass('op-0');
            });

        });
    </script>
@endsection
