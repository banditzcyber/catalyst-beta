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
            <h4 class="mg-b-0 tx-spacing--1 tx-16">
                @foreach ($title2 as $vTitle)
                    {{ $vTitle->employee_name }} - {{ $vTitle->position }}
                @endforeach
            </h4>
        </div>
        <div class="d-none d-md-block">
            <div class="btn-group" role="group" aria-label="Basic example">
                <a href="/generalAldp" class="btn btn-sm pd-x-15 btn-danger btn-uppercase mg-l-5">
                    <i data-feather="corner-down-left" class="wd-10 mg-r-5"></i>
                    back
                </a>
            </div>
        </div>
    </div>
    {{-- Budge --}}
    <div class="d-md-flex align-items-center justify-content-between mg-b-10">
        <div class="col-12 mg-t-10">
            <div class="card">

                <div class="card-body pd-0">
                    <div class="row no-gutters">
                        <div class="col col-sm-6 col-lg bd-l bd-5 bd-pink">
                            <div class="crypto">
                                <div class="media mg-b-10">
                                    <div class="media-body pd-l-0">
                                        <h6 class="tx-11 tx-spacing-1 tx-uppercase tx-semibold mg-b-5">Functional Competency
                                            <span class="tx-color-03 tx-normal">(FC)</span>
                                        </h6>
                                        <div class="d-flex align-items-baseline tx-rubik">
                                            <h5 class="tx-20 mg-b-0">{{ number_format($functional_percent) }} %</h5>
                                            {{-- <p class="mg-b-0 tx-11 tx-danger mg-l-3"><i class="icon ion-md-arrow-down"></i>0.77%</p> --}}
                                        </div>
                                    </div><!-- media-body -->
                                </div><!-- media -->

                                <div class="pos-absolute b-5 l-20 tx-medium">
                                    <label class="tx-9 tx-uppercase tx-sans tx-color-03">
                                        <a href="" class="link-01 tx-semibold">{{ $functional_all }}</a> Planning
                                    </label>
                                    <label class="tx-9 tx-uppercase tx-sans tx-color-03 mg-l-10">
                                        <a href="" class="link-01 tx-semibold">{{ $functional_comp }}</a> Completed
                                    </label>
                                </div>
                            </div><!-- crypto -->
                        </div>
                        <div class="col col-sm-6 col-lg bd-l bd-5 bd-pink">
                            <div class="crypto">
                                <div class="media mg-b-10">

                                    <div class="media-body pd-l-0">
                                        <h6 class="tx-11 tx-spacing-1 tx-uppercase tx-semibold mg-b-5">Core and Leadership
                                            Competency <span class="tx-color-03 tx-normal">(CC)</span></h6>
                                        <div class="d-flex align-items-baseline tx-rubik">
                                            <h5 class="tx-20 mg-b-0">{{ number_format($cnl_percent) }}</h5>
                                            {{-- <p class="mg-b-0 tx-11 tx-success mg-l-3"><i class="icon ion-md-arrow-up"></i>4.34%</p> --}}
                                        </div>
                                    </div><!-- media-body -->
                                </div><!-- media -->

                                <div class="pos-absolute b-5 l-20 tx-medium ">
                                    <label class="tx-9 tx-uppercase tx-sans tx-color-03">
                                        <a href="" class="link-01 tx-semibold">{{ $cnl_all }}</a> Planning
                                    </label>
                                    <label class="tx-9 tx-uppercase tx-sans tx-color-03 mg-l-10">
                                        <a href="" class="link-01 tx-semibold">{{ $cnl_comp }}</a> Completed
                                    </label>
                                </div>
                            </div><!-- crypto -->
                        </div>
                        <div class="col col-sm-6 col-lg bd-t bd-lg-t-0 bd-l bd-5 bd-pink">
                            <div class="crypto">
                                <div class="media mg-b-10">

                                    <div class="media-body pd-l-0">
                                        <h6 class="tx-11 tx-spacing-1 tx-uppercase tx-semibold mg-b-5">Other Program <span
                                                class="tx-color-03 tx-normal">(OP)</span></h6>
                                        <div class="d-flex align-items-baseline">
                                            <h5 class="tx-20 mg-b-0">{{ number_format($other_percent) }}</h5>
                                            {{-- <p class="mg-b-0 tx-11 tx-danger mg-l-3"><i class="icon ion-md-arrow-down"></i>2.17%</p> --}}
                                        </div>
                                    </div><!-- media-body -->
                                </div><!-- media -->



                                <div class="pos-absolute b-5 l-20 tx-medium">
                                    <label class="tx-9 tx-uppercase tx-sans tx-color-03">
                                        <a href="" class="link-01 tx-semibold">{{ $other_all }}</a> Planning
                                    </label>
                                    <label class="tx-9 tx-uppercase tx-sans tx-color-03 mg-l-10">
                                        <a href="" class="link-01 tx-semibold">{{ $other_comp }}</a> Completed
                                    </label>
                                </div>
                            </div><!-- crypto -->
                        </div>
                    </div><!-- row -->
                </div><!-- card-body -->
            </div><!-- card -->
        </div><!-- col -->

    </div>

    {{-- functional competency  --}}
    <div class="row row-xs mg-b-20">
        <div class="table-responsive">
            <div class="mg-t-10 mg-b-5" role="alert">
                <a href="#" id="actionFunctional" class="tx-black tx-bold tx-14 tx-uppercase">
                    Functional Competency
                    <i data-feather="chevrons-down" style="width: 15px;"></i>
                </a>
            </div>

            <!-- table -->

            <div class="d-flex tx-center tx-uppercase">

                <div class="table-line-header" style="width: 5px;">

                </div>
                <div class="table-header" style="width: 50px;">
                    No
                </div>
                <div class="table-header" style="width: 445px;">
                    item competency
                </div>
                <div class="table-header" style="width: 100px;">
                    target
                </div>
                <div class="table-header" style="width: 340px;">
                    participant
                </div>
                <div class="table-header" style="width: 185px;">
                    remarks
                </div>
                <div class="table-header-right" style="width: 60px;">
                    %
                </div>
            </div>

            <div id="functional">

                @if (!empty($functional))
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($functional as $view)
                        <div class="d-flex tx-12 table-body-hover" id="detail_functional">

                            <div class="table-line-body" style="width: 5px;">

                            </div>

                            <div class="table-body tx-center" style="width: 50px;">
                                {{ $no++ }}
                            </div>

                            <div class="table-body" style="width: 444px;">

                                <div class="tx-uppercase tx-bold">{{ $view->competency_name }}</div>
                                <div class="mb-2 tx-italic tx-color-02">{{ $view->ps_name }}</div>
                                <div>{{ $view->item_id }}</div>
                                <div class="tx-bold">{{ $view->item_name }}
                                    <label class="tx-italic">
                                        [{{ $view->intervention }}, {{ $view->type_training }}]
                                    </label>
                                </div>
                            </div>
                            <div class="table-body tx-center" style="width: 101px;">
                                <div>{{ $view->planned_month }} ({{ $view->planned_week }})</div>
                            </div>

                            <a href="/generalAldpParticipantFinish/{{ $view->id_aldp_details }}/{{ $view->aldp_id }}/{{ $view->item_id }}/1"
                                class="table-body" style="width: 340px;">

                                @php
                                    $detail = DB::table('learnings')
                                        ->select('learnings.*', 'employees.employee_id', 'employees.employee_name')
                                        ->leftjoin('employees', 'employees.employee_id', '=', 'learnings.employee_id')
                                        ->where('learnings.aldp_detail_id', '=', $view->id_aldp_details)
                                        ->get();
                                @endphp

                                @foreach ($detail as $vDetail)
                                    <span
                                        class="badge
                                        @if ($vDetail->status == 1) badge-primary

                                        @elseif ($vDetail->status == 2)
                                            badge-warning
                                        @else
                                            badge-success @endif
                                    ">
                                        {{ $vDetail->employee_name }}
                                    </span>
                                @endforeach

                            </a>

                            <div class="table-body" style="width: 185px;">
                                <div>{{ $view->remarks }}</div>
                            </div>

                            @php
                                $propose = DB::table('learnings')
                                    ->where('aldp_detail_id', '=', $view->id_aldp_details)
                                    ->count();

                                $actual = DB::table('learnings')
                                    ->where('aldp_detail_id', '=', $view->id_aldp_details)
                                    ->where('status', '=', 3)
                                    ->count();
                                if (empty($propose)) {
                                    $total = 0;
                                } else {
                                    $total = ($actual / $propose) * 100;
                                }
                            @endphp



                            <div class="table-body tx-center"
                                style="width: 60px;
                            @if ($total == 0) background: #E2445C; color: #FFFDE7
                        @elseif ($total <= 75)
                            background: #FDAB3D; color: #FFFDE7
                        @elseif ($total <= 90)
                            background: #0086C0; color: #FFFDE7
                        @elseif ($total >= 91)
                            background: #00C875; color: #FFFDE7 @endif">

                                {{ number_format($total, 0) }}%

                            </div>

                        </div>
                    @endforeach

                    <div class="d-flex table-body-hover" id="">

                        <div class="table-line-body-footer" style="width: 5px;">

                        </div>
                        <div class="table-body tx-right tx-bold tx-grey" style="width: 1100px;">
                            Sub-Total
                        </div>

                        <div class="table-body-footer tx-center tx-bold tx-grey"
                            style="width: 60px;
                        @if ($functional_percent == 0) background: #E2445C; color: #FFFDE7
                        @elseif ($functional_percent <= 75)
                            background: #FDAB3D; color: #FFFDE7
                        @elseif ($functional_percent <= 90)
                            background: #0086C0; color: #FFFDE7
                        @elseif ($functional_percent >= 91)
                            background: #00C875; color: #FFFDE7 @endif">
                            {{ number_format($functional_percent, 0) }}%
                        </div>
                    </div>
                @else
                    <div class="d-flex table-body-hover" id="">

                        <div class="table-line-body-footer" style="width: 5px;">

                        </div>
                        <div class="table-body-footer tx-italic tx-center tx-italic tx-grey" style="width: 1160px;">
                            no data
                        </div>
                    </div>
                @endif
            </div>
        </div>
        <div class="row mg-t-5">
            <div class="col-md">
                <ul class="list-inline d-flex mg-t-20 mg-sm-t-10 mg-md-t-0 mg-b-0">
                    <li class="list-inline-item d-flex align-items-center">
                        <span class="d-block wd-10 ht-10 bg-primary rounded mg-r-5"></span>
                        <span class="tx-sans tx-uppercase tx-10 tx-medium tx-color-03">Submitted</span>
                    </li>
                    <li class="list-inline-item d-flex align-items-center mg-l-5">
                        <span class="d-block wd-10 ht-10 bg-warning rounded mg-r-5"></span>
                        <span class="tx-sans tx-uppercase tx-10 tx-medium tx-color-03">Reviewed</span>
                    </li>
                    <li class="list-inline-item d-flex align-items-center mg-l-5">
                        <span class="d-block wd-10 ht-10 bg-success rounded mg-r-5"></span>
                        <span class="tx-sans tx-uppercase tx-10 tx-medium tx-color-03">Completed</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    {{-- Core Leadership Competency --}}
    <div class="row row-xs mg-b-20">
        <div class="table-responsive">
            <div class="mg-t-10 mg-b-5" role="alert">
                <a href="#" id="actionLeadership" class="tx-black tx-bold tx-14 tx-uppercase">
                    Core and Leardership Program
                    <i data-feather="chevrons-down" style="width: 15px;"></i>
                </a>
            </div>

            <!-- table -->

            <div class="d-flex tx-center tx-uppercase">

                <div class="table-line-header" style="width: 5px;">

                </div>
                <div class="table-header" style="width: 50px;">
                    No
                </div>
                <div class="table-header" style="width: 445px;">
                    item competency
                </div>
                <div class="table-header" style="width: 100px;">
                    target
                </div>
                <div class="table-header" style="width: 340px;">
                    participant
                </div>
                <div class="table-header" style="width: 185px;">
                    remarks
                </div>
                <div class="table-header-right" style="width: 60px;">
                    %
                </div>

            </div>

            <div id="cnl">

                @if (!empty($cnl))
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($cnl as $view)
                        <div class="d-flex tx-12 table-body-hover" id="detail_functional">

                            <div class="table-line-body" style="width: 5px;">

                            </div>
                            <div class="table-body tx-center" style="width: 50px;">
                                {{ $no++ }}
                            </div>

                            <div class="table-body" style="width: 444px;">
                                <div>{{ $view->item_id }}</div>
                                <div class="">{{ $view->item_name }}
                                    <label class="tx-italic">
                                        [{{ $view->intervention }}, {{ $view->type_training }}]
                                    </label>
                                </div>
                            </div>
                            <div class="table-body tx-center" style="width: 101px;">
                                <div>{{ $view->planned_month }} ({{ $view->planned_week }})</div>
                            </div>

                            <a href="/generalAldpParticipantFinish/{{ $view->id_aldp_details }}/{{ $view->aldp_id }}/{{ $view->item_id }}/2"
                                class="table-body" style="width: 340px;">


                                @php
                                    $detail = DB::table('learnings')
                                        ->select('learnings.*', 'employees.employee_id', 'employees.employee_name')
                                        ->leftjoin('employees', 'employees.employee_id', '=', 'learnings.employee_id')
                                        ->where('learnings.aldp_detail_id', '=', $view->id_aldp_details)
                                        ->get();
                                @endphp

                                @foreach ($detail as $vDetail)
                                    <span
                                        class="badge
                                        @if ($vDetail->status == 1) badge-primary

                                        @elseif ($vDetail->status == 2)
                                            badge-warning
                                        @else
                                            badge-success @endif
                                    ">
                                        {{ $vDetail->employee_name }}
                                    </span>
                                @endforeach

                            </a>

                            <div class="table-body" style="width: 185px;">
                                <div>{{ $view->remarks }}</div>
                            </div>

                            @php
                                $propose = DB::table('learnings')
                                    ->where('aldp_detail_id', '=', $view->id_aldp_details)
                                    ->count();

                                $actual = DB::table('learnings')
                                    ->where('aldp_detail_id', '=', $view->id_aldp_details)
                                    ->where('status', '=', 3)
                                    ->count();
                                if (empty($propose)) {
                                    $total = 0;
                                } else {
                                    $total = ($actual / $propose) * 100;
                                }
                            @endphp


                            <div class="table-body tx-center"
                                style="width: 60px;
                            @if ($total == 0) background: #E2445C; color: #FFFDE7
                        @elseif ($total <= 75)
                            background: #FDAB3D; color: #FFFDE7
                        @elseif ($total <= 90)
                            background: #0086C0; color: #FFFDE7
                        @elseif ($total >= 91)
                            background: #00C875; color: #FFFDE7 @endif">

                                {{ number_format($total, 0) }}%

                            </div>

                        </div>
                    @endforeach

                    <div class="d-flex table-body-hover" id="">

                        <div class="table-line-body-footer" style="width: 5px;">

                        </div>
                        <div class="table-body tx-right tx-bold tx-grey" style="width: 1100px;">
                            Sub-Total
                        </div>

                        <div class="table-body-footer tx-center tx-bold tx-grey"
                            style="width: 60px;
                        @if ($cnl_percent == 0) background: #E2445C; color: #FFFDE7
                        @elseif ($cnl_percent <= 75)
                            background: #FDAB3D; color: #FFFDE7
                        @elseif ($cnl_percent <= 90)
                            background: #0086C0; color: #FFFDE7
                        @elseif ($cnl_percent >= 91)
                            background: #00C875; color: #FFFDE7 @endif">
                            {{ number_format($cnl_percent, 0) }}%
                        </div>
                    </div>
                @else
                    <div class="d-flex table-body-hover" id="">

                        <div class="table-line-body-footer" style="width: 5px;">

                        </div>
                        <div class="table-body-footer tx-italic tx-center tx-italic tx-grey" style="width: 1160px;">
                            no data
                        </div>
                    </div>
                @endif
            </div>
        </div>
        <div class="row mg-t-5">
            <div class="col-md">
                <ul class="list-inline d-flex mg-t-20 mg-sm-t-10 mg-md-t-0 mg-b-0">
                    <li class="list-inline-item d-flex align-items-center">
                        <span class="d-block wd-10 ht-10 bg-primary rounded mg-r-5"></span>
                        <span class="tx-sans tx-uppercase tx-10 tx-medium tx-color-03">Submitted</span>
                    </li>
                    <li class="list-inline-item d-flex align-items-center mg-l-5">
                        <span class="d-block wd-10 ht-10 bg-warning rounded mg-r-5"></span>
                        <span class="tx-sans tx-uppercase tx-10 tx-medium tx-color-03">Reviewed</span>
                    </li>
                    <li class="list-inline-item d-flex align-items-center mg-l-5">
                        <span class="d-block wd-10 ht-10 bg-success rounded mg-r-5"></span>
                        <span class="tx-sans tx-uppercase tx-10 tx-medium tx-color-03">Completed</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    {{-- Other Program --}}
    <div class="row row-xs mg-b-20">
        <div class="table-responsive">
            <div class="mg-t-10 mg-b-5" role="alert">
                <a href="#" id="actionOther" class="tx-black tx-bold tx-14 tx-uppercase">
                    Other Program
                    <i data-feather="chevrons-down" style="width: 15px;"></i>
                </a>
            </div>

            <!-- table -->

            <div class="d-flex tx-center tx-uppercase">

                <div class="table-line-header" style="width: 5px;">

                </div>
                <div class="table-header" style="width: 50px;">
                    No
                </div>
                <div class="table-header" style="width: 445px;">
                    item competency
                </div>
                <div class="table-header" style="width: 100px;">
                    target
                </div>
                <div class="table-header" style="width: 340px;">
                    participant
                </div>
                <div class="table-header" style="width: 185px;">
                    remarks
                </div>
                <div class="table-header-right" style="width: 60px;">
                    %
                </div>

            </div>

            <div id="other">

                @if (!empty($other))
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($other as $view)
                        <div class="d-flex tx-12 table-body-hover" id="detail_functional">

                            <div class="table-line-body" style="width: 5px;">

                            </div>
                            <div class="table-body tx-center" style="width: 50px;">
                                {{ $no++ }}
                            </div>

                            <div class="table-body" style="width: 444px;">
                                <div>{{ $view->item_name }}</div>
                                {{-- <div class="">{{ $view->item_name }}
                                    <label class="tx-italic">
                                        [{{ $view->intervention }}, {{ $view->type_training }}]
                                    </label>
                                </div> --}}
                            </div>
                            <div class="table-body tx-center" style="width: 101px;">
                                <div>{{ $view->planned_month }} ({{ $view->planned_week }})</div>
                            </div>

                            <a href="/generalAldpParticipantFinish/{{ $view->id_aldp_details }}/{{ $view->aldp_id }}/{{ $view->item_id }}/3"
                                class="table-body" style="width: 340px;">

                                @php
                                    $detail = DB::table('learnings')
                                        ->select('learnings.*', 'employees.employee_id', 'employees.employee_name')
                                        ->leftjoin('employees', 'employees.employee_id', '=', 'learnings.employee_id')
                                        ->where('learnings.aldp_detail_id', '=', $view->id_aldp_details)
                                        ->get();
                                @endphp

                                @foreach ($detail as $vDetail)
                                    <span
                                        class="badge
                                            @if ($vDetail->status == 1) badge-primary

                                            @elseif ($vDetail->status == 2)
                                                badge-warning
                                            @else
                                                badge-success @endif
                                        ">
                                        {{ $vDetail->employee_name }}
                                    </span>
                                @endforeach

                            </a>

                            <div class="table-body" style="width: 185px;">
                                <div>{{ $view->remarks }}</div>
                            </div>

                            @php
                                $propose = DB::table('learnings')
                                    ->where('aldp_detail_id', '=', $view->aldp_detail_id)
                                    ->count();

                                $actual = DB::table('learnings')
                                    ->where('aldp_detail_id', '=', $view->aldp_detail_id)
                                    ->where('status', '=', 2)
                                    ->count();

                                // $total = 0;

                                if (empty($actual)) {
                                    $total = 0;
                                } else {
                                    $total = ($actual / $propose) * 100;
                                }
                            @endphp

                            <div class="table-body tx-center"
                                style="width: 60px;
                            @if ($total == 0) background: #E2445C; color: #FFFDE7
                        @elseif ($total <= 75)
                            background: #FDAB3D; color: #FFFDE7
                        @elseif ($total <= 90)
                            background: #0086C0; color: #FFFDE7
                        @elseif ($total >= 91)
                            background: #00C875; color: #FFFDE7 @endif">

                                {{ number_format($total, 0) }}%
                            </div>

                        </div>
                    @endforeach

                    <div class="d-flex table-body-hover" id="">

                        <div class="table-line-body-footer" style="width: 5px;">

                        </div>
                        <div class="table-body tx-right tx-bold tx-grey" style="width: 1100px;">
                            Sub-Total
                        </div>

                        <div class="table-body-footer tx-center tx-bold tx-grey"
                            style="width: 60px;
                        @if ($cnl_percent == 0) background: #E2445C; color: #FFFDE7
                        @elseif ($cnl_percent <= 75)
                            background: #FDAB3D; color: #FFFDE7
                        @elseif ($cnl_percent <= 90)
                            background: #0086C0; color: #FFFDE7
                        @elseif ($cnl_percent >= 91)
                            background: #00C875; color: #FFFDE7 @endif">
                            {{ number_format($cnl_percent, 0) }}%
                        </div>
                    </div>
                @else
                    <div class="d-flex table-body-hover" id="">

                        <div class="table-line-body-footer" style="width: 5px;">

                        </div>
                        <div class="table-body-footer tx-italic tx-center tx-italic tx-grey" style="width: 1160px;">
                            no data
                        </div>
                    </div>
                @endif
            </div>
        </div>
        <div class="row mg-t-5">
            <div class="col-md">
                <ul class="list-inline d-flex mg-t-20 mg-sm-t-10 mg-md-t-0 mg-b-0">
                    <li class="list-inline-item d-flex align-items-center">
                        <span class="d-block wd-10 ht-10 bg-primary rounded mg-r-5"></span>
                        <span class="tx-sans tx-uppercase tx-10 tx-medium tx-color-03">Submitted</span>
                    </li>
                    <li class="list-inline-item d-flex align-items-center mg-l-5">
                        <span class="d-block wd-10 ht-10 bg-warning rounded mg-r-5"></span>
                        <span class="tx-sans tx-uppercase tx-10 tx-medium tx-color-03">Reviewed</span>
                    </li>
                    <li class="list-inline-item d-flex align-items-center mg-l-5">
                        <span class="d-block wd-10 ht-10 bg-success rounded mg-r-5"></span>
                        <span class="tx-sans tx-uppercase tx-10 tx-medium tx-color-03">Completed</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>


    {{-- -------------------------------------- MODAL ------------------------------------- --}}

    <div class="modal fade" id="modalItem" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
            <div class="modal-content">

                <div class="modal-body pd-sm-t-10 pd-sm-b-10 pd-sm-x-5">
                    <div class="row row-xs">
                        <div class="col-sm-4 tx-center bg-primary">
                            <a href="/generalAldp/functional/{{ $id_aldp }}" class=" tx-white">
                                Functional Competency
                            </a>
                        </div>
                        <div class="col-sm-4 tx-center bg-success">
                            <a href="/generalAldp/leadership/{{ $id_aldp }}" class=" tx-white">
                                Leadership Program
                            </a>
                        </div>
                        <div class="col-sm-4 tx-center bg-dark">
                            <a href="/generalAldp/other/{{ $id_aldp }}" class=" tx-white">
                                Other Program
                            </a>
                        </div>
                    </div>

                </div><!-- modal-body -->
            </div><!-- modal-content -->
        </div><!-- modal-dialog -->
    </div><!-- modal -->


    <script src="/lib/jquery/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#actionFunctional").click(function() {
                $("#functional").toggle(1000);
            });
            $("#actionLeadership").click(function() {
                $("#leadership").toggle(1000);
            });
            $("#actionOther").click(function() {
                $("#other").toggle(1000);
            });
        });
    </script>

@endsection
