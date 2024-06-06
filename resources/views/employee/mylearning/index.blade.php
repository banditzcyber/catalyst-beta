@extends('layouts.main') @section('body')
    <div class="mg-t-0 mg-b-5 pd-0">
        <img src="/images/cap/bnr2.jpg" alt="">
    </div>
    <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
        {{-- <div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                    <li class="breadcrumb-item">
                        <a href="#">{{ $title }}</a>
                    </li>
                </ol>
            </nav>
            <h4 class="mg-b-0 tx-spacing--1">{{ $title }}</h4>
        </div> --}}
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
        <div class="row">
            @foreach ($data as $post)
                @php
                    if ($post->status == 1) {
                        $view = 'Assigned';
                        $color = 'primary';
                        $link = 'form';
                        $btn = 'Go';
                        $action = '';
                        $detail = 'disabled';
                    } elseif ($post->status == 2) {
                        $view = 'On-Progress';
                        $color = 'warning';
                        $link = 'details';
                        $btn = 'Detail';
                        $action = 'disabled';
                        $detail = '';
                    } elseif ($post->status == 3) {
                        $view = 'Completed';
                        $color = 'success';
                        $link = 'details';
                        $btn = 'Detail';
                        $action = 'disabled';
                        $detail = '';
                    } else {
                        $view = 'Rejected';
                        $color = 'danger';
                        $link = 'details';
                        $btn = 'Detail';
                        $action = 'disabled';
                        $detail = '';
                    }
                @endphp
                <div class="col-lg-4 col-md-6 mg-t-10">
                    <div class="card">

                        <div class="card-body pd-5">
                            <div class="row row-sm">

                                <div class="col-4">
                                    <div class="marker marker-ribbon marker-{{ $color }} pos-absolute t-10 l-0">
                                        {{ $view }}</div>
                                    <img src="/images/cap/card.jpg" class="card-img" alt=""
                                        style="max-width: 100px">
                                </div>

                                <div class="col-8">
                                    <div class="chart-ten pd-t-5 pd-b-15">

                                        <p class="mg-b-0 tx-10">
                                            Functional Competency
                                        </p>

                                        <p class="tx-13 tx-bold mg-b-0">
                                            {{ str_word_count($post->item_name) > 5 ? substr($post->item_name, 0, 25) . ' [...]' : $post->item_name }}
                                        </p>
                                        <label class="badge badge-light">
                                            {{ str_word_count($post->intervention) > 2 ? substr($post->intervention, 0, 10) . ' [...]' : $post->intervention }}
                                            {{-- {{ $post->intervention }} --}}
                                        </label>
                                        <label class="badge badge-light">{{ $post->type_training }}</label>

                                    </div>
                                    <div class="mg-b-10">

                                        <a href="/mylearnig/form/{{ $post->id }}"
                                            class="btn btn-xs btn-warning {{ $action }}">
                                            Action
                                        </a>
                                        <a href="/mylearnig/details/{{ $post->id }}"
                                            class="btn btn-xs btn-dark {{ $detail }}">
                                            Detail
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div><!-- card-body -->
                    </div><!-- card -->
                </div>
            @endforeach
        </div>
    </div>
@endsection
