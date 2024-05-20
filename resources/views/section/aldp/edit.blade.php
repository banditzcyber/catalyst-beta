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
            <a href="/aldpSection/{{ $id_aldp }}" class="btn btn-sm pd-x-15 btn-danger btn-uppercase mg-l-5">
                <i data-feather="corner-down-left" class="wd-10 mg-r-5"></i>
                back
            </a>
        </div>
    </div>

    <div class="col-md-8">
        <form action="/sectionAldp/update" method="post">
            @csrf

            <div class="form-group row row-xs">
                <div class="col-sm-3">
                    <input type="hidden" name="aldp_detail_id" id="aldp_detail_id" class="form-control " autofocus
                        value="{{ $data->id }}" placeholder="position" readonly />
                </div>
                <div class="col-sm-5">
                    <input type="hidden" name="aldp_id" id="aldp_id" class="form-control " autofocus
                        value="{{ $data->aldp_id }}" placeholder="position" readonly />
                </div>
            </div>

            <div class="form-group row row-xs">
                <label class="col-sm-4 col-form-label">Item ID</label>
                <div class="col-sm-8">
                    <div class="input-group">
                        <input type="text" class="form-control @error('item_id') is-invalid @enderror"
                            placeholder="Search..." name="item_id" id="item_id"
                            value="{{ old('item_id', $data->item_id) }}" readonly />
                        <div class="input-group-append">
                            <button class="btn btn-outline-light" type="button" data-toggle="modal"
                                data-target="#modalItem">
                                <i data-feather="search" class="wd-15"></i>
                            </button>
                        </div>
                    </div>
                </div>
                @error('item_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group row row-xs">
                <label class="col-sm-4 col-form-label">Item Name</label>
                <div class="col-sm-8">
                    <input type="text" name="item_name" id="item_name"
                        class="form-control @error('item_name') is-invalid @enderror"
                        value="{{ old('item_name', $data->item_name) }}" placeholder="item_name" readonly />
                </div>
                @error('item_name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group row row-xs">
                <label class="col-sm-4 col-form-label">Performance Standard</label>
                <div class="col-sm-8">
                    <textarea name="ps_name" class="form-control @error('ps_name') is-invalid @enderror" id="ps_name" cols="30"
                        rows="3" name="desc" value="{{ old('ps_name') }}">{{ $data->ps_name }}</textarea>
                    @error('ps_name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                @error('ps_name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group row row-xs">
                <label class="col-sm-4 col-form-label">Competency</label>
                <div class="col-sm-8">
                    <input type="text" name="competency_name" id="competency_name"
                        class="form-control @error('competency_name') is-invalid @enderror" autofocus
                        value="{{ old('competency_name', $data->competency_name) }}" placeholder="competency_name"
                        readonly />
                </div>
                @error('competency_name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group row row-xs">
                <label class="col-sm-4 col-form-label">Level/Intervention/Type Training</label>
                <div class="col-sm-2">
                    <input type="text" name="level" id="level" class="form-control " autofocus placeholder="level"
                        value="{{ old('competency_name', $data->level) }}" readonly />
                </div>
                <div class="col-sm-3">
                    <input type="text" name="intervention" id="intervention" class="form-control " autofocus
                        placeholder="intervention" value="{{ old('competency_name', $data->intervention) }}" readonly />
                </div>
                <div class="col-sm-3">
                    <input type="text" name="type_training" id="type_training" class="form-control " autofocus
                        placeholder="type training" value="{{ old('competency_name', $data->type_training) }}"
                        readonly />
                </div>
            </div>

            <div class="form-group row row-xs">
                <label class="col-sm-4 col-form-label">Planning</label>
                <div class="col-sm-5">

                    <select class="custom-select" name="planned_month" id="planned_month">
                        <option @if (old('planned_month', $data->planned_month) == 'January') selected @endif>January</option>
                        <option @if (old('planned_month', $data->planned_month) == 'February') selected @endif>February</option>
                        <option @if (old('planned_month', $data->planned_month) == 'March') selected @endif>March</option>
                        <option @if (old('planned_month', $data->planned_month) == 'April') selected @endif>April</option>
                        <option @if (old('planned_month', $data->planned_month) == 'May') selected @endif>May</option>
                        <option @if (old('planned_month', $data->planned_month) == 'June') selected @endif>June</option>
                        <option @if (old('planned_month', $data->planned_month) == 'July') selected @endif>July</option>
                        <option @if (old('planned_month', $data->planned_month) == 'August') selected @endif>August</option>
                        <option @if (old('planned_month', $data->planned_month) == 'September') selected @endif>September</option>
                        <option @if (old('planned_month', $data->planned_month) == 'October') selected @endif>October</option>
                        <option @if (old('planned_month', $data->planned_month) == 'November') selected @endif>November</option>
                        <option @if (old('planned_month', $data->planned_month) == 'December') selected @endif>December</option>
                    </select>

                </div>
                <div class="col-sm-3">
                    <select class="custom-select" name="planned_week" id="planned_week">
                        <option @if (old('planned_week', $data->planned_week) == '1') selected @endif>1</option>
                        <option @if (old('planned_week', $data->planned_week) == '2') selected @endif>2</option>
                        <option @if (old('planned_week', $data->planned_week) == '3') selected @endif>3</option>
                        <option @if (old('planned_week', $data->planned_week) == '4') selected @endif>4</option>
                        <option @if (old('planned_week', $data->planned_week) == '5') selected @endif>5</option>
                    </select>
                </div>


                @error('planning_week')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group row row-xs">
                <label class="col-sm-4 col-form-label">Comment / Remarks</label>
                <div class="col-sm-8">
                    <textarea name="remarks" class="form-control @error('remarks') is-invalid @enderror" id="remarks" cols="30"
                        rows="3" value="">
                        {{ old('remarks', $data->remarks) }}</textarea>
                    @error('remarks')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                @error('remarks')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>


            <div class="form-group row row-xs mg-b-0">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-sm btn-primary">
                        <i data-feather="save" class="wd-10 mg-r-5"></i>
                        Submit Form
                    </button>
                </div>
            </div>
        </form>
    </div>

    <div class="modal fade" id="modalItem" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">

                <div class="modal-body pd-sm-t-10 pd-sm-b-10 pd-sm-x-20">

                    <table id="tableData" class="table table-bordered table-hover table-striped"
                        style="font-size: 12px;">
                        <thead>
                            <tr>
                                <th>Competency</th>
                                <th>Performance Standars</th>
                                <th style="width: 5%">Level</th>
                                <th>Learning Item</th>
                                <th>Intervention</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($item as $view)
                                <tr class="get" item_id="{{ $view->item_id }}" item_name="{{ $view->item_name }}"
                                    ps_name="{{ $view->ps_name }}" competency_name="{{ $view->competency_name }}"
                                    level="{{ $view->level }}" intervention="{{ $view->intervention }}"
                                    type_training="{{ $view->type_training }}">
                                    <td>{{ $view->competency_name }}</td>
                                    <td>{{ Str::limit($view->ps_name, 100) }}</td>
                                    <td>{{ $view->level }}</td>
                                    <td>{{ $view->item_name }}</td>
                                    <td>{{ $view->intervention }} ({{ $view->type_training }})</td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>

                </div><!-- modal-body -->
            </div><!-- modal-content -->
        </div><!-- modal-dialog -->
    </div><!-- modal -->

    @push('scripts')
        <script>
            $(document).ready(function() {
                $("#tableData").DataTable();
            });

            $(document).on("click", ".get", function(e) {
                $("#item_id").val($(this).attr("item_id"));
                $("#item_name").val($(this).attr("item_name"));
                $("#ps_name").val($(this).attr("ps_name"));
                $("#competency_name").val($(this).attr("competency_name"));
                $("#level").val($(this).attr("level"));
                $("#intervention").val($(this).attr("intervention"));
                $("#type_training").val($(this).attr("type_training"));
                $("#modalItem").modal("hide");
            });
        </script>
    @endpush
@endsection
