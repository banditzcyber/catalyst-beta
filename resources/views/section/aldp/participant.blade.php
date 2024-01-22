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

    <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
        <div>
            <div class="row ">
                <div class="col-md">
                    <form action="/competency">
                        <div class="input-group">
                            <input type="text" class="form-control tx-12" placeholder="Search..." name="search"
                                value="{{ request('search') }}" style="width: 250px">
                            <div class="input-group-append">
                                <button class="btn btn-outline-light btn-sm" type="submit" id="button-addon2">
                                    <i data-feather="search" class="wd-15"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="d-none d-md-block">
            <form action="/addParticipant" method="post">
                @csrf

                <div class="form-group row row-xs mg-0">

                    <div class="col-sm-10">

                        <div class="search-form input-group">
                            <input type="hidden" class="form-control tx-11" name="competency_type" id="competency_type"
                                value="1" required>
                            <input type="hidden" class="form-control tx-11" name="id_aldp" id="id_aldp"
                                value="{{ $id_aldp }}" required>
                            <input type="hidden" class="form-control tx-11" name="aldp_detail_id" id="aldp_detail_id"
                                value="{{ $id_aldp_details }}" required>
                            <input type="hidden" class="form-control tx-11" name="item_id" id="item_id"
                                value="{{ $item_id }}" required>
                            <input type="hidden" class="form-control tx-11" name="item_name" id="item_name"
                                value="{{ $item_name }}" required>
                            <input type="hidden" class="form-control tx-11" name="employee_id" id="employee_id" required>
                            <input type="text" class="form-control tx-11" name="employee_name" id="employee_name"
                                required>
                            <button class="btn btn-xs pd-x-15 btn-dark btn-uppercase" data-toggle="modal"
                                data-target="#modalemployee">
                                <i data-feather="search" class="wd-15"></i>
                            </button>
                        </div>


                    </div>

                    <div class="col-sm-2">
                        <button type="submit" class="btn btn-sm btn-dark btn-uppercase">
                            Add
                        </button>
                    </div>
                </div>
            </form>

        </div>
    </div>


    @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive">
        <table id="viewdata" class="table table-bordered tx-12 table-hover">
            <thead class="thead-primary">
                <tr>
                    <th style="width: 45px">#</th>
                    <th style="width: 100px">ID</th>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Date</th>
                    <th>Comment</th>
                    <th>Evidence</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($data as $view)
                    @php

                        if ($view->status == 1) {
                            $color = 'bg-light';
                            $text = 'Submited';
                        } elseif ($view->status == 2) {
                            $color = 'bg-warning';
                            $text = 'Riviewed';
                        } else {
                            $color = 'bg-success';
                            $text = 'Completed';
                        }
                    @endphp
                    <tr>
                        <td>
                            <form action="/deleteParticipant" method="post" class="d-inline"
                                onclick="return confirm('Are you sure?')">
                                @csrf
                                <input type="hidden" class="form-control tx-11" name="id_learning" id="id_learning"
                                    value="{{ $view->id }}" required>
                                <input type="hidden" class="form-control tx-11" name="id_aldp" id="id_aldp"
                                    value="{{ $id_aldp }}" required>
                                <input type="hidden" class="form-control tx-11" name="aldp_detail_id" id="aldp_detail_id"
                                    value="{{ $id_aldp_details }}" required>
                                <button class="badge badge-danger pd-y-0 border-0" type="submit">
                                    <i data-feather="x" class="wd-15"></i>
                                </button>
                            </form>
                        </td>
                        <td>{{ $view->employee_id }}</td>
                        <td>{{ $view->employee_name }}</td>
                        <td>{{ $view->position }}</td>
                        <td>{{ $view->started_at }} s/d {{ $view->finished_at }}</td>
                        <td>{{ $view->comment }}</td>
                        <td>{{ $view->evidence }}</td>
                        <td class="{{ $color }} tx-center">{{ $text }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{ $data->links() }}

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
                $("#modalemployee").modal("hide");
            });
        </script>
    @endpush
@endsection
