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
            <a href="/assessmentEmployee" class="btn btn-sm pd-x-15 btn-danger btn-uppercase mg-l-5">
                <i data-feather="corner-down-left" class="wd-10 mg-r-5"></i>
                back
            </a>
        </div>
    </div>



    <form id="form" action="/savevalidationform" method="post">
        @csrf
        @foreach ($data as $vData)
            <div class="card mg-b-10">
                <div class="card-body">
                    <span class="step-desc tx-bold tx-warning tx-uppercase">Level <?= $vData->level ?></span>
                    <span class="step-desc mb-2 text-muted tx-11"><?= $vData->ps_name ?></span>
                    <span class="card-text tx-14 tx-dark tx-bold">
                        <label>[<?= $vData->item_id ?>]</label>
                        -
                        <label class="tx-uppercase">[<?= $vData->intervention ?>]</label>
                        <?= $vData->item_name ?>
                    </span>
                </div>
                <div class="card-footer">
                    <input type="text" class="tx-12 mg-b-5 pd-t-5" style="width: 60px; border-radius: 0px; height: 30px;"
                        name="kd_assessment_detail[]" id="kd_assessment_detail[]" value="<?= $vData->id ?>">
                    <input type="text" class="tx-12 custom-select mg-b-5 pd-t-5"
                        style="width: 60px; border-radius: 0px; height: 30px;" name="assessment_id" id="assessment_id"
                        value="<?= $assessment_id ?>">
                    <input type="text"class="tx-12 custom-select mg-b-5 pd-t-5"
                        style="width: 190px; border-radius: 0px; height: 30px;" name="item_id[]" id="item_id"
                        value="<?= $vData->item_id ?>">



                    <select name="assessment_result[]" id="assessment_result" class="tx-12 custom-select mg-b-5 pd-t-5"
                        style="width: 190px; border-radius: 0px; height: 30px;">

                        <option value="{{ $vData->assessment_result }}" @selected(old('assessment_result') == $vData->assessment_result)>
                            @if ($vData->assessment_result == 1)
                                competent
                            @elseif($vData->assessment_result == 2)
                                Need Improvement
                            @else
                                Not Applicable
                            @endif
                        </option>
                        <option value="1">Competent</option>
                        <option value="2">Need Improvement</option>
                        <option value="3">Not Applicable</option>
                    </select>&nbsp;<span class="badge badge-warning tx-italic">if not selected, it will automatically
                        counted as "Need Improvement"</span>
                    <textarea id="" class="form-control col-lg-6 tx-12 pd-t-5" name="comment[]" placeholder="Comment"
                        style="border-radius: 0px;"></textarea>

                </div>
            </div>
        @endforeach
        <input type="submit" class="btn btn-info btn-block" value="Save"
            onclick="return confirm('Are you sure you want to submit this form?');">
    </form>
    </div>
@endsection
