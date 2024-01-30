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
            <a href="/aldpAdmin" class="btn btn-sm pd-x-15 btn-danger btn-uppercase mg-l-5">
                <i data-feather="corner-down-left" class="wd-10 mg-r-5"></i>
                back
            </a>
        </div>
    </div>

    <div class="col-md-8">
        <form action="/aldpAdmin/update" method="post">
            @csrf

            <input type="hidden" name="aldp_id" id="aldp_id" value="{{ $data->id }}">
            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Manager ID</label>
                <div class="col-sm-3">
                    <div class="input-group">
                        <input type="text" class="form-control @error('manager_id') is-invalid @enderror"
                            placeholder="Search..." name="manager_id" id="manager_id"
                            value="{{ old('manager_id', $data->manager_id) }}" readonly />
                        <div class="input-group-append">
                            <button class="btn btn-outline-light" type="button" data-toggle="modal"
                                data-target="#modalemployee">
                                <i data-feather="search" class="wd-15"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-sm-5">
                    <input type="text" name="employee_name" id="employee_name"
                        class="form-control @error('employee_name') is-invalid @enderror" autofocus
                        value="{{ old('employee_name', $data->employee_name) }}" placeholder="employee name" readonly />
                </div>
                @error('manager_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Position</label>
                <div class="col-sm-8">
                    <input type="text" name="position" id="position"
                        class="form-control @error('position') is-invalid @enderror" autofocus
                        value="{{ old('position', $data->position) }}" placeholder="position" readonly />
                </div>
                @error('position')
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
                <label class="col-sm-4 col-form-label">Year</label>
                <div class="col-sm-8">

                    <select class="custom-select" name="year" id="year">
                        <option @if (old('year', $data->year) == '2023') selected @endif>2023</option>
                        <option @if (old('year', $data->year) == '2024') selected @endif>2024</option>
                        <option @if (old('year', $data->year) == '2025') selected @endif>2025</option>
                        <option @if (old('year', $data->year) == '2026') selected @endif>2026</option>
                        <option @if (old('year', $data->year) == '2027') selected @endif>2027</option>
                    </select>
                </div>
                @error('year')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>


            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Comment / Remarks</label>
                <div class="col-sm-8">
                    <textarea name="comment" class="form-control @error('comment') is-invalid @enderror" id="comment">
                        {{ old('comment', $data->comment) }}
                    </textarea>
                    @error('comment')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                @error('comment')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Year</label>
                <div class="col-sm-8">

                    <select class="custom-select" name="status" id="status">
                        <option value="1" @if (old('status', $data->status) == '1') selected @endif>Developed</option>
                        <option value="2" @if (old('status', $data->status) == '2') selected @endif>Reviewed</option>
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
                                <th>LEVEL</th>
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
            });

            $(document).on("click", ".get", function(e) {
                $("#manager_id").val($(this).attr("employeeId"));
                $("#employee_name").val($(this).attr("employeeName"));
                $("#position").val($(this).attr("position"));
                $("#jobcode").val($(this).attr("jobcode"));
                $("#modalemployee").modal("hide");
            });
        </script>
    @endpush
@endsection
