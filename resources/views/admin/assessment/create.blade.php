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
            <a href="/assessmentAdmin" class="btn btn-sm pd-x-15 btn-danger btn-uppercase mg-l-5">
                <i data-feather="corner-down-left" class="wd-10 mg-r-5"></i>
                back
            </a>
        </div>
    </div>

    <div class="col-md-8">
        <form action="/assessmentAdmin" method="post">
            @csrf

            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Employee ID</label>
                <div class="col-sm-3">
                    <div class="input-group">
                        <input type="text" class="form-control @error('employee_id') is-invalid @enderror"
                            placeholder="Search..." name="employee_id" id="employee_id" value="{{ old('compmetency_id') }}"
                            readonly />
                        <div class="input-group-append">
                            <button class="btn btn-outline-light" type="button" data-toggle="modal"
                                data-target="#modalemployee">
                                <i data-feather="search" class="wd-15"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <input type="text" name="employee_name" id="employee_name"
                        class="form-control @error('employee_name') is-invalid @enderror" autofocus
                        value="{{ old('employee_name') }}" placeholder="employee name" readonly />
                </div>
                @error('employee_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Position</label>
                <div class="col-sm-9">
                    <input type="text" name="position" id="position"
                        class="form-control @error('position') is-invalid @enderror" autofocus value="{{ old('position') }}"
                        placeholder="position" readonly />
                </div>
                @error('position')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Jobcode</label>
                <div class="col-sm-9">
                    <input type="text" name="jobcode" id="jobcode"
                        class="form-control @error('jobcode') is-invalid @enderror" autofocus value="{{ old('jobcode') }}"
                        placeholder="jobcode" readonly />
                </div>
                @error('jobcode')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Year</label>
                <div class="col-sm-9">
                    <select class="custom-select" name="year" id="year">
                        <option selected class="tx-italic">--please select-</option>
                        <option value="2023">2023</option>
                        <option value="2024">2024</option>
                        <option value="2025">2025</option>
                        <option value="2026">2026</option>
                        <option value="2027">2027</option>
                    </select>
                </div>
                @error('year')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Status</label>
                <div class="col-sm-4">
                    <select class="custom-select" name="status" id="status">
                        <option value="1">Self Assessment</option>
                        <option value="2">Review by Superior</option>
                        <option value="3">Completed</option>
                    </select>
                </div>
                <label class="col-sm-2 col-form-label">Launch</label>
                <div class="col-sm-3">
                    <select class="custom-select" name="status_launch" id="status_launch">
                        <option value="2">Not Actived</option>
                        <option value="1">Actived</option>
                    </select>
                </div>
                @error('year')
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
                                <th>ID</th>
                                <th>NAME</th>
                                <th>POSITION</th>
                                <th>SECTION</th>
                                <th>JOBCODE</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($employee as $vemployee)
                                <tr class="get" employeeID="{{ $vemployee->employee_id }}"
                                    employeeName="{{ $vemployee->employee_name }}" position="{{ $vemployee->position }}"
                                    jobcode="{{ $vemployee->jobcode }}">
                                    <td>{{ $vemployee->employee_id }}</td>
                                    <td>{{ $vemployee->employee_name }}</td>
                                    <td>{{ $vemployee->position }}</td>
                                    <td>{{ $vemployee->section }}</td>
                                    <td>{{ $vemployee->jobcode }}</td>
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
            });

            $(document).on("click", ".get", function(e) {
                $("#employee_id").val($(this).attr("employeeId"));
                $("#employee_name").val($(this).attr("employeeName"));
                $("#position").val($(this).attr("position"));
                $("#jobcode").val($(this).attr("jobcode"));
                $("#modalemployee").modal("hide");
            });
        </script>
    @endpush
@endsection
