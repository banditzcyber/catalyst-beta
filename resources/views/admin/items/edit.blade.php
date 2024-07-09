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
            <a href="/competency" class="btn btn-sm pd-x-15 btn-danger btn-uppercase mg-l-5">
                <i data-feather="corner-down-left" class="wd-10 mg-r-5"></i>
                back
            </a>
        </div>
    </div>

    <div class="col-md-8">
        <form action="/competency/updateData" method="post">
            @csrf

            <input type="hidden" name="id_competency" id="id_competency" value="{{ $data->id }}">

            <div class="form-group row">
                <label class="col-sm-4 col-form-label">PS ID</label>
                <div class="col-sm-8">
                    <div class="input-group">
                        <input type="text" class="form-control @error('ps_id') is-invalid @enderror"
                            placeholder="Search..." name="ps_id" id="ps_id" value="{{ old('ps_id', $data->ps_id) }}"
                            readonly />
                        <div class="input-group-append">
                            <button class="btn btn-outline-light" type="button" data-toggle="modal"
                                data-target="#modalCompetency">
                                <i data-feather="search" class="wd-15"></i>
                            </button>
                        </div>
                    </div>
                </div>
                @error('ps_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Item ID</label>
                <div class="col-sm-8">
                    <input type="text" name="item_id" id="item_id"
                        class="form-control tx-uppercase @error('item_id') is-invalid @enderror" autofocus
                        value="{{ old('item_id', $data->item_id) }}" placeholder="XX-XXXX-XXXXXXXX-XXXX" />
                </div>
                @error('item_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Item Name</label>
                <div class="col-sm-8">
                    <textarea name="item_name" class="form-control @error('item_name') is-invalid @enderror" id="item_name" cols="30"
                        rows="5" name="desc" value="{{ old('item_name') }}">{{ $data->item_name }}</textarea>
                    @error('item_name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                @error('item_name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Item Name (bahasa)</label>
                <div class="col-sm-8">
                    <textarea name="item_bahasa" class="form-control @error('item_bahasa') is-invalid @enderror" id="item_bahasa"
                        cols="30" rows="5" name="desc" value="{{ old('item_bahasa') }}">{{ $data->item_bahasa }}</textarea>
                    @error('item_bahasa')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                @error('item_bahasa')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Intervention</label>
                <div class="col-sm-8">
                    <select class="form-control select2" multiple="multiple" name="intervention" id="intervention">
                        <option value="{{ $data->intervention }}" @selected(old('role_id') == $data->intervention)>
                            {{ $data->intervention }}
                        </option>

                        <option value="Self Learning">Self Learning</option>
                        <option value="Classroom">Classroom</option>
                        <option value="OJT">OJT</option>
                        <option value="Shadowing">Shadowing</option>
                        <option value="Coaching">Coaching</option>
                        <option value="Assignment">Assignment</option>
                        <option value="Instructor">Instructor</option>
                        <option value="Conference">Conference</option>
                    </select>
                </div>
                @error('competency_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Type of Training</label>
                <div class="col-sm-8">
                    <select class="custom-select" name="type_training" id="type_training">
                        <option value="{{ $data->type_training }}" @selected(old('role_id') == $data->type_training)>
                            {{ $data->type_training }}
                        </option>

                        <option value="Internal">Internal</option>
                        <option value="External">External</option>
                    </select>
                </div>
                @error('competency_id')
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
        </form>
    </div>


    @push('scripts')
        <script nonce="{{ csp_nonce() }}">
            var cleaveI = new Cleave('#item_id', {
                delimiters: ['-', '-', '-'],
                blocks: [2, 4, 8, 4]
            });

            $(document).ready(function() {
                $("#data_detail").DataTable();
            });

            $(document).on("click", ".get", function(e) {
                $("#competency_id").val($(this).attr("competencyId"));
                $("#competency_name").val($(this).attr("competencyName"));
                $("#modalCompetency").modal("hide");
            });

            $('.select2').select2({
                placeholder: 'Choose one',
                maximumSelectionLength: 2
            });

            $(function() {
                'use strict'

                // Basic with search
                $('.select2').select2({
                    placeholder: 'Choose one',
                    searchInputPlaceholder: 'Search options'
                });

                // Disable search
                $('.select2-no-search').select2({
                    minimumResultsForSearch: Infinity,
                    placeholder: 'Choose one'
                });

                // Clearable selection
                $('.select2-clear').select2({
                    minimumResultsForSearch: Infinity,
                    placeholder: 'Choose one',
                    allowClear: true
                });

                // Limit selection
                $('.select2-limit').select2({
                    minimumResultsForSearch: Infinity,
                    placeholder: 'Choose one',
                    maximumSelectionLength: 2
                });

            });
        </script>
    @endpush
@endsection
