@extends('layouts.main')

@section('body')
    <div class="mg-t-0 mg-b-5 pd-0">

        <img src="/images/cap/bnr.jpg" alt="">
    </div>
    <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
        <div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                    <li class="breadcrumb-item">
                        {{-- <a href="#">{{ $title }}</a> --}}
                    </li>
                </ol>
            </nav>

        </div>
        <div class="d-none d-md-block">
            <a href="/assessmentEmployee/{{ $assessment_id }}" class="btn btn-sm pd-x-15 btn-danger btn-uppercase mg-l-5">
                <i data-feather="corner-down-left" class="wd-10 mg-r-5"></i>
                back
            </a>
        </div>
    </div>
    <h5 class="x-spacing--4 tx-sans tx-indigo tx-uppercase mb-1">{{ $competency_name }}</h5>
    <p class="tx-12 mg-t-20">{{ $competency_desc }}</p>
    <label class="tx-12 tx-italic">{{ $competency_desc_bahasa }}</label>




    <form id="form" action="/saveformassessment" method="post">
        @csrf
        @foreach ($data as $vData)
            <div class="card mg-b-10">
                <div class="card-body">
                    <span class="step-desc tx-bold tx-primary tx-uppercase tx-sans">Level <?= $vData->level ?></span>
                    <span class="mb-0 tx-13">
                        <?= $vData->ps_name ?>
                        <lavel class="tx-italic tx-color-02">
                            (<?= $vData->ps_bahasa ?>)
                        </lavel>
                    </span>

                    <p class="card-text tx-13 tx-dark mg-t-15">
                        <?= $vData->item_name ?><br />
                        <label class="tx-uppercase tx-color-03 mt-2">[<?= $vData->intervention ?>]</label>
                    </p>
                </div>
                <div class="card-footer">
                    <input type="hidden" class="tx-12 custom-select mg-b-5 pd-t-5"
                        style="width: 60px; border-radius: 0px; height: 30px;" name="kd_assessment_update"
                        id="kd_assessment_update" value="<?= $assessment_id ?>">
                    <input type="hidden" class="tx-12 custom-select mg-b-5 pd-t-5"
                        style="width: 60px; border-radius: 0px; height: 30px;" name="assessment_id[]" id="assessment_id"
                        value="<?= $assessment_id ?>">
                    <input type="hidden"class="tx-12 custom-select mg-b-5 pd-t-5"
                        style="width: 190px; border-radius: 0px; height: 30px;" name="item_id[]" id="item_id"
                        value="<?= $vData->item_id ?>">

                    <select name="assessment_result[]" id="assessment_result" class="tx-12 custom-select mg-b-5 pd-t-5"
                        style="width: 190px; border-radius: 0px; height: 30px;">
                        <option value="2" class="tx-italic">--please select--</option>
                        <option value="1">Complete</option>
                        <option value="2">Need Improvement</option>
                        <option value="3">Not Applicable</option>
                    </select>&nbsp;<span class="badge badge-warning tx-italic">if not selected, it will automatically
                        counted as "Need Improvement"</span>
                    <textarea id="" class="form-control col-lg-6 tx-12 pd-t-5" name="comment[]" placeholder="Comment"
                        style="border-radius: 0px;"></textarea>

                </div>
            </div>
        @endforeach
        <input type="submit" class="btn btn-primary btn-block tx-16" value="SAVE"
            onclick="return confirm('Are you sure you want to submit this form?');">
    </form>
    </div>
@endsection
