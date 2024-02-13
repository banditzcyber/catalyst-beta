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
            <h4 class="mg-b-0 tx-spacing--1">{{ $title }}</h4>
        </div>
        <div class="d-none d-md-block">
            <a href="/mylearning" class="btn btn-sm pd-x-15 btn-danger btn-uppercase mg-l-5">
                <i data-feather="corner-down-left" class="wd-10 mg-r-5"></i>
                back
            </a>
        </div>
    </div>

    <div class="col-md-8">
        @foreach ($data2 as $view)
            <div class="card card-body mg-b-10">
                <div class="row row-xs">
                    <div class="col-md-6">
                        <h6 class="mg-b-0 tx-10">Competency</h6>
                        <p class="tx-12 tx-color-03 mg-b-10">{{ $view->competency_name }}</p>

                        <h6 class="mg-b-0 tx-10">Performance Standards</h6>
                        <p class="tx-12 tx-color-03 mg-b-10">{{ $view->ps_name }}</p>

                        <h6 class="mg-b-0 tx-10">Level</h6>
                        <p class="tx-12 tx-color-03 mg-b-0">{{ $view->level }}</p>

                    </div>
                    <div class="col-md-5 mg-l-5">
                        <h6 class="mg-b-0 tx-10">Item ID</h6>
                        <p class="tx-12 tx-color-03 mg-b-10">{{ $view->item_id }}</p>

                        <h6 class="mg-b-0 tx-10">Leanring Items</h6>
                        <p class="tx-12 tx-color-03 mg-b-10">{{ $view->item_name }}</p>

                        <h6 class="mg-b-0 tx-10">Intervention</h6>
                        <p class="tx-12 tx-color-03 mg-b-10">{{ $view->intervention }}</p>

                        <h6 class="mg-b-0 tx-10">Type Training</h6>
                        <p class="tx-12 tx-color-03 mg-b-0">{{ $view->type_training }}</p>
                    </div>
                </div>
            </div>
        @endforeach

        <form action="/mylearning" method="post" enctype="multipart/form-data">
            @csrf

            <input type="hidden" name="learning_id" id="learning_id" value="{{ $learning_id }}">
            <div data-label="Example" class="df-example">
                {{-- <div class="form-group row row-xs">
                    <label class="col-sm-4 col-form-label">Date</label>
                    <div class="col-sm-4">
                        <input type="text" name="daterange" value="01/01/2018 - 01/15/2018" />
                    </div>
                    <div class="col-sm-4">
                        <input type="text" id="dateTo" class="form-control" placeholder="To">
                    </div>
                    <div id="datepicker2"></div>
                </div> --}}

                <div class="form-group row row-xs">

                    <label class="col-sm-4 col-form-label">Date</label>
                    <div class="col-sm-4">
                        <input type="date" name="started_at" id="started_at"
                            class="form-control @error('started_at') is-invalid @enderror" autofocus
                            placeholder="started_at" />
                    </div>
                    @error('started_at')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="col-sm-4">
                        <input type="date" name="finished_at" id="finished_at"
                            class="form-control @error('finished_at') is-invalid @enderror" autofocus
                            placeholder="finished_date" />
                    </div>
                    @error('finished_at')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group row row-xs">
                    <label class="col-sm-4 col-form-label">Evidence (.pdf)</label>
                    <div class="form-group">
                        {{-- <input type="file" class="form-control-file @error('evidence') is-invalid @enderror"
                            id="evidence" name="evidence" accept="application/pdf"> --}}

                        <input type="file" name="evidence" id="inputFile"
                            class="form-control @error('evidence') is-invalid @enderror">
                        @error('evidence')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>



                @error('evidence')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

                <div class="form-group row row-xs">
                    <label class="col-sm-4 col-form-label">Remarks</label>
                    <div class="col-sm-8">
                        <textarea name="comment" class="form-control @error('comment') is-invalid @enderror" id="comment" cols="30"
                            rows="3" value="{{ old('comment') }}"></textarea>
                        @error('comment')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    @error('competency_bahasa')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>


                <div class="form-group row mg-b-0">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-sm btn-primary">
                            <i data-feather="save" class="wd-10 mg-r-5"></i>
                            Submit Form
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>



    @push('scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/js/bootstrap-datepicker.min.js">
        </script>
        <link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
        <script src="assets/plugins/global/plugins.bundle.js"></script>
        <script type="s">
            $(function() {
                $('input[name="daterange"]').daterangepicker({
                  opens: 'left'
                }, function(start, end, label) {
                  console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
                });
              });

            var cleaveI = new Cleave('#competency_id', {
                delimiters: ['-', '-', '-'],
                blocks: [2, 3, 1, 3]
            });

            $(document).ready(function() {
                $("#data_detail").DataTable();
            });

            $(document).on("click", ".get", function(e) {
                $("#competency_id").val($(this).attr("competencyId"));
                $("#competency_name").val($(this).attr("competencyName"));
                $("#modalCompetency").modal("hide");
            });

            $(function() {
                'use strict'

                $('#datepicker1').datepicker();

                $('#datepicker2').datepicker({
                    showOtherMonths: true,
                    selectOtherMonths: true
                });

                $('#datepicker3').datepicker({
                    showOtherMonths: true,
                    selectOtherMonths: true,
                    changeMonth: true,
                    changeYear: true
                });

                $('#datepicker4').datepicker();

                $('#datepicker5').datepicker({
                    showButtonPanel: true
                });

                $('#datepicker6').datepicker({
                    numberOfMonths: 2
                });

                var dateFormat = 'mm/dd/yy',
                    from = $('#dateFrom')
                    .datepicker({
                        defaultDate: '+1w',
                        numberOfMonths: 2
                    })
                    .on('change', function() {
                        to.datepicker('option', 'minDate', getDate(this));
                    }),
                    to = $('#dateTo').datepicker({
                        defaultDate: '+1w',
                        numberOfMonths: 2
                    })
                    .on('change', function() {
                        from.datepicker('option', 'maxDate', getDate(this));
                    });

                function getDate(element) {
                    var date;
                    try {
                        date = $.datepicker.parseDate(dateFormat, element.value);
                    } catch (error) {
                        date = null;
                    }

                    return date;
                }


            });
        </script>
    @endpush
@endsection
