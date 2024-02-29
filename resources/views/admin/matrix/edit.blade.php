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
            <a href="/matrix" class="btn btn-sm pd-x-15 btn-danger btn-uppercase mg-l-5">
                <i data-feather="corner-down-left" class="wd-10 mg-r-5"></i>
                back
            </a>
        </div>
    </div>

    <div class="col-md-8">
        <form action="/matrix/updateData" method="post">
            @csrf

            <input type="hidden" name="id_pm" id="id_pm" value="{{ $data->id }}">
            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Competency ID</label>
                <div class="col-sm-8">
                    <div class="input-group">
                        <input type="text" class="form-control @error('competency_id') is-invalid @enderror"
                            placeholder="Search..." name="competency_id" id="competency_id"
                            value="{{ old('competency_id', $data->competency_id) }}" readonly />
                        <div class="input-group-append">
                            <button class="btn btn-outline-light" type="button" data-toggle="modal"
                                data-target="#modalCompetency">
                                <i data-feather="search" class="wd-15"></i>
                            </button>
                        </div>
                    </div>
                </div>
                @error('competency_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Competency Name</label>
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
            <hr>
            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Section</label>
                <div class="col-sm-8">
                    <div class="input-group">
                        <input type="text" class="form-control @error('section') is-invalid @enderror"
                            placeholder="Search..." name="section" id="section"
                            value="{{ old('section', $data->section) }}" />
                        <div class="input-group-append">
                            <button class="btn btn-outline-light" type="button" data-toggle="modal"
                                data-target="#modalemployee">
                                <i data-feather="search" class="wd-15"></i>
                            </button>
                        </div>
                    </div>
                </div>
                @error('section')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Position</label>
                <div class="col-sm-5">
                    <input type="text" name="position" id="position"
                        class="form-control @error('position') is-invalid @enderror" autofocus
                        value="{{ old('position', $data->position) }}" placeholder="position" />
                </div>
                <div class="col-sm-3">
                    <input type="text" name="position_title" id="position_title"
                        class="form-control @error('position_title') is-invalid @enderror" autofocus
                        value="{{ old('position_title', $data->position_title) }}" placeholder="position_title" />
                </div>

                @error('position_title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Jobcode</label>
                <div class="col-sm-8">
                    <input type="text" name="jobcode" id="jobcode"
                        class="form-control @error('jobcode') is-invalid @enderror" autofocus
                        value="{{ old('jobcode', $data->jobcode) }}" placeholder="jobcode" readonly />
                </div>
                @error('jobcode')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Targer</label>
                <div class="col-sm-8">

                    <select class="custom-select" name="level" id="level">
                        <option value="1" @if (old('level', $data->level) == '1') selected @endif>Level 1</option>
                        <option value="2" @if (old('level', $data->level) == '2') selected @endif>Level 2</option>
                        <option value="2" @if (old('level', $data->level) == '3') selected @endif>Level 3</option>
                        <option value="2" @if (old('level', $data->level) == '4') selected @endif>Level 4</option>
                    </select>

                </div>
                @error('level')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <hr>

            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Position Future</label>
                <div class="col-sm-5">
                    <div class="input-group">
                        <input type="text" name="position_future" id="position_future"
                            class="form-control @error('position_future') is-invalid @enderror" autofocus
                            value="{{ old('position_future', $data->position_future) }}" />
                        <div class="input-group-append">
                            <button class="btn btn-outline-light" type="button" data-toggle="modal"
                                data-target="#modalemployee2">
                                <i data-feather="search" class="wd-15"></i>
                            </button>
                        </div>
                    </div>

                </div>
                <div class="col-sm-3">
                    <input type="text" name="position_title_future" id="position_title_future"
                        class="form-control @error('position_title_future') is-invalid @enderror" autofocus
                        value="{{ old('position_title_future', $data->position_title_future) }}"
                        placeholder="position_title_future" />
                </div>

                @error('position_future')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Jobcode Future</label>
                <div class="col-sm-8">
                    <input type="text" name="jobcode_future" id="jobcode_future"
                        class="form-control @error('jobcode_future') is-invalid @enderror" autofocus
                        value="{{ old('jobcode_future', $data->jobcode_future) }}" placeholder="jobcode_future"
                        readonly />
                </div>
                @error('jobcode_future')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Target Future</label>
                <div class="col-sm-8">
                    <select class="custom-select" name="level_future" id="level_future">
                        <option value="1" @if (old('level_future', $data->level_future) == '1') selected @endif>Level 1</option>
                        <option value="2" @if (old('level_future', $data->level_future) == '2') selected @endif>Level 2</option>
                        <option value="2" @if (old('level_future', $data->level_future) == '3') selected @endif>Level 3</option>
                        <option value="2" @if (old('level_future', $data->level_future) == '4') selected @endif>Level 4</option>
                    </select>
                </div>
                @error('level_future')
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

    <div class="modal fade" id="modalemployee" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel2" style="margin-top: 5px;">Modal Title</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pd-sm-t-10 pd-sm-b-10 pd-sm-x-20">

                    <table id="data_detail" class="table table-bordered table-hover table-striped"
                        style="width: 100%; font-size: 12px;">
                        <thead>
                            <tr>
                                <th>SECTION</th>
                                <th>POSITION</th>
                                <th>JOBCODE</th>
                                <th>LEVEL</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($employee as $vemployee)
                                <tr class="get" position="{{ $vemployee->position }}"
                                    jobcode="{{ $vemployee->jobcode }}" section="{{ $vemployee->section }}"
                                    job_level="{{ $vemployee->job_level }}">
                                    <td>{{ $vemployee->section }}</td>
                                    <td>{{ $vemployee->position }}</td>
                                    <td>{{ $vemployee->jobcode }}</td>
                                    <td>{{ $vemployee->job_level }}</td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>

                </div><!-- modal-body -->
                <div class="modal-footer pd-x-20 pd-y-15">
                    <button type="button" class="btn btn-xs btn-white" data-dismiss="modal">Cancel</button>
                    <button type="button" onclick="save()" class="btn btn-xs btn-primary btnSave">Save</button>
                </div>
            </div><!-- modal-content -->
        </div><!-- modal-dialog -->
    </div><!-- modal -->

    <div class="modal fade" id="modalCompetency" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered " role="document">
            <div class="modal-content">

                <div class="modal-body pd-sm-t-10 pd-sm-b-10 pd-sm-x-20">

                    <table id="dataCompetency" class="table table-bordered table-hover table-striped"
                        style="width: 100%; font-size: 12px;">
                        <thead>
                            <tr>
                                <th>Competency ID</th>
                                <th>Competency Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($competency as $vCompetency)
                                <tr class="getCompetency" competencyID="{{ $vCompetency->competency_id }}"
                                    competencyName="{{ $vCompetency->competency_name }}">
                                    <td>{{ $vCompetency->competency_id }}</td>
                                    <td>{{ $vCompetency->competency_name }}</td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>

                </div><!-- modal-body -->
            </div><!-- modal-content -->
        </div><!-- modal-dialog -->
    </div><!-- modal -->

    <div class="modal fade" id="modalemployee2" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel2" style="margin-top: 5px;">Modal Title</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pd-sm-t-10 pd-sm-b-10 pd-sm-x-20">

                    <table id="data_detail2" class="table table-bordered table-hover table-striped"
                        style="width: 100%; font-size: 12px;">
                        <thead>
                            <tr>
                                <th>SECTION</th>
                                <th>POSITION</th>
                                <th>JOBCODE</th>
                                <th>LEVEL</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($employee as $vemployee)
                                <tr class="get2" position2="{{ $vemployee->position }}"
                                    jobcode2="{{ $vemployee->jobcode }}" section2="{{ $vemployee->section }}"
                                    job_level2="{{ $vemployee->job_level }}">
                                    <td>{{ $vemployee->section }}</td>
                                    <td>{{ $vemployee->position }}</td>
                                    <td>{{ $vemployee->jobcode }}</td>
                                    <td>{{ $vemployee->job_level }}</td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>

                </div><!-- modal-body -->
                <div class="modal-footer pd-x-20 pd-y-15">
                    <button type="button" class="btn btn-xs btn-white" data-dismiss="modal">Cancel</button>
                    <button type="button" onclick="save()" class="btn btn-xs btn-primary btnSave">Save</button>
                </div>
            </div><!-- modal-content -->
        </div><!-- modal-dialog -->
    </div><!-- modal -->

    @push('scripts')
        <script>
            $(document).ready(function() {
                $("#data_detail").DataTable();
                $("#data_detail2").DataTable();
                $("#dataCompetency").DataTable();
            });

            $(document).on("click", ".get", function(e) {
                $("#section").val($(this).attr("section"));
                $("#position").val($(this).attr("position"));
                $("#jobcode").val($(this).attr("jobcode"));
                $("#position_title").val($(this).attr("job_level"));
                $("#modalemployee").modal("hide");
            });

            $(document).on("click", ".get2", function(e) {
                $("#section_future").val($(this).attr("section2"));
                $("#position_future").val($(this).attr("position2"));
                $("#jobcode_future").val($(this).attr("jobcode2"));
                $("#position_title_future").val($(this).attr("job_level2"));
                $("#modalemployee2").modal("hide");
            });

            $(document).on("click", ".getCompetency", function(e) {
                $("#competency_id").val($(this).attr("competencyID"));
                $("#competency_name").val($(this).attr("competencyName"));
                $("#modalCompetency").modal("hide");
            })
        </script>
    @endpush
@endsection
