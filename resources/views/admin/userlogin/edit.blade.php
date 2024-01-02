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
            <a href="/userlogin" class="btn btn-sm pd-x-15 btn-danger btn-uppercase mg-l-5">
                <i data-feather="corner-down-left" class="wd-10 mg-r-5"></i>
                back
            </a>
        </div>
    </div>

    <div class="col-md-8">
        <form action="/userlogin" method="post">
            @csrf

            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Employee ID</label>
                <div class="col-sm-3">
                    <div class="input-group">
                        <input type="text" class="form-control @error('employee_id') is-invalid @enderror"
                            placeholder="Search..." name="employee_id" id="employee_id"
                            value="{{ old('compmetency_id', $user->employee_id) }}" readonly />
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
                        value="{{ old('employee_name', $user->employee_name) }}" placeholder="employee name" readonly />
                </div>
                @error('employee_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>


            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Email</label>
                <div class="col-sm-8">
                    <input type="text" name="email" id="email"
                        class="form-control @error('email') is-invalid @enderror" autofocus
                        value="{{ old('email', $user->email) }}" placeholder="email" readonly />
                </div>
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Password</label>
                <div class="col-sm-8">
                    <input type="password" name="password" id="password"
                        class="form-control @error('password') is-invalid @enderror" autofocus
                        value="{{ old('password', $user->password) }}" placeholder="password" />
                </div>
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Role ID</label>
                <div class="col-sm-8">
                    <select class="custom-select" name="year" id="year">
                        <option @if (old('role_id', $user->role_id) == '1') selected @endif>Employee</option>
                        <option @if (old('role_id', $user->role_id) == '2') selected @endif>Section</option>
                        <option @if (old('role_id', $user->role_id) == '3') selected @endif>Department</option>
                        <option @if (old('role_id', $user->role_id) == '4') selected @endif>General</option>
                        <option @if (old('role_id', $user->role_id) == '5') selected @endif>Adm. Functional</option>
                        <option @if (old('role_id', $user->role_id) == '6') selected @endif>Root</option>
                    </select>
                </div>
                @error('role_id')
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

                <div class="modal-body pd-sm-t-10 pd-sm-b-10 pd-sm-x-20">

                    <table id="data_detail" class="table table-bordered table-hover table-striped"
                        style="width: 100%; font-size: 12px;">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>NAME</th>
                                <th>POSITION</th>
                                <th>SECTION</th>
                                <th>EMAIL</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $vemployee)
                                <tr class="get" employeeID="{{ $vemployee->employee_id }}"
                                    employeeName="{{ $vemployee->employee_name }}" position="{{ $vemployee->position }}"
                                    email="{{ $vemployee->email }}" job_level="{{ $vemployee->job_level }}">
                                    <td>{{ $vemployee->employee_id }}</td>
                                    <td>{{ $vemployee->employee_name }}</td>
                                    <td>{{ $vemployee->position }}</td>
                                    <td>{{ $vemployee->section }}</td>
                                    <td>{{ $vemployee->email }}</td>
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
                $("#data_detail").DataTable();
            });

            $(document).on("click", ".get", function(e) {
                $("#employee_id").val($(this).attr("employeeId"));
                $("#employee_name").val($(this).attr("employeeName"));
                $("#position").val($(this).attr("position"));
                $("#email").val($(this).attr("email"));
                $("#job_level").val($(this).attr("job_level"));
                $("#modalemployee").modal("hide");
            });
        </script>
    @endpush
@endsection
