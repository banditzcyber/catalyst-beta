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

        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card card-body">
                <div class="d-md-flex align-items-center justify-content-between">
                    @foreach ($competency as $view)
                        <div class="media align-sm-items-center">
                            <div class="tx-40 tx-lg-60 lh-0 tx-orange"><i class="fa fa-book"></i></div>
                            <div class="media-body mg-l-15">
                                <h6 class="tx-12 tx-lg-14 tx-semibold tx-uppercase tx-spacing-1 mg-b-5">
                                    {{ $view->competency_id }}</h6>
                                <div class="d-flex align-items-baseline">
                                    <h2 class="tx-20 tx-lg-28 tx-normal tx-rubik tx-spacing--2 lh-2 mg-b-0">
                                        {{ $view->competency_name }}</h2>
                                </div>
                            </div><!-- media-body -->
                        </div><!-- media -->
                    @endforeach

                    <div class="d-flex flex-column flex-sm-row mg-t-20 mg-md-t-0">
                        <a href="/assessmentEmployee/{{ $assessment_id }}"
                            class="btn btn-sm pd-x-15 btn-danger btn-uppercase mg-l-5">
                            <i data-feather="corner-down-left" class="wd-10 mg-r-5"></i>
                            back
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div>
        <table id="competent" class="table table-bordered tx-11">
            <thead class="thead-primary">
                <tr>
                    <th class="wd-20p">Item ID</th>
                    <th>Item Name</th>
                    <th>Intervention</th>
                    <th class="wd-10p">Type Training</th>
                    <th class="wd-5p">Result</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $view)
                    @php
                        if ($view->assessment_result == 1) {
                            $bg = 'bg-success';
                            $text = 'Competent';
                        } elseif ($view->assessment_result == 2) {
                            $bg = 'bg-danger';
                            $text = 'Need Improvement';
                        } else {
                            $bg = 'bg-warning';
                            $text = 'Not Applicable';
                        }
                    @endphp
                    <tr>
                        <td>{{ $view->item_id }}</td>
                        <td>{{ $view->item_name }}</td>
                        <td>{{ $view->intervention }}</td>
                        <td>{{ $view->type_training }}</td>
                        <td class="{{ $bg }} tx-center tx-white">{{ $text }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
