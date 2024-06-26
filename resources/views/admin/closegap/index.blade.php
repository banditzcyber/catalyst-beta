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

            <div class="btn-group mg-0" role="group" aria-label="Basic example">
                <a href="/closegapall" class="btn btn-sm pd-x-15 btn-uppercase mg-l-5 {{ $all }}">
                    <i data-feather="list" class="wd-10 mg-r-5"></i>
                    Functional
                </a>
                <a href="/closegapall" class="btn btn-sm pd-x-15 btn-uppercase mg-l-5 {{ $all }}">
                    <i data-feather="list" class="wd-10 mg-r-5"></i>
                    Leardership
                </a>
                <a href="/closegapall" class="btn btn-sm pd-x-15 btn-uppercase mg-l-5 {{ $all }}">
                    <i data-feather="list" class="wd-10 mg-r-5"></i>
                    Other
                </a>
            </div>

            <div class="btn-group mg-0" role="group" aria-label="Basic example">
                <a href="/closegapall" class="btn btn-sm pd-x-15 btn-uppercase mg-l-5 {{ $all }}">
                    <i data-feather="list" class="wd-10 mg-r-5"></i>

                </a>
                <a href="/closegap" class="btn btn-sm pd-x-15 btn-uppercase mg-l-5 {{ $submitted }}"
                    data-toggle="tooltip" data-placement="top" title="Tooltip on top">
                    <i data-feather="navigation" class="wd-10 mg-r-5"></i>

                </a>
                <a href="/closegapreview" class="btn btn-sm pd-x-15 btn-uppercase mg-l-5 {{ $reviewed }}">
                    <i data-feather="refresh-cw" class="wd-10 mg-r-5"></i>

                </a>
                <a href="/closegapcompleted" class="btn btn-sm pd-x-15 btn-uppercase mg-l-5 {{ $completed }}">
                    <i data-feather="check-circle" class="wd-10 mg-r-5"></i>

                </a>
            </div>

        </div>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif


    <div class="table-responsive">
        {{-- <div id="read"></div> --}}
        <table id="viewdata" class="table table-bordered tx-12 table-hover">
            <thead class="thead-primary tx-uppercase">
                <tr class="bd-l bd-4 bd-danger">
                    <th>Employee</th>
                    <th>Item ID</th>
                    <th>Item Name</th>
                    <th>Date</th>
                    <th>Doc</th>
                    <th>Comment</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $view)
                    @php

                        if ($view->status == 1) {
                            $color = 'bg-light';
                            $text = 'Submitted';
                        } elseif ($view->status == 2) {
                            $color = 'bg-warning';
                            $text = 'Reviewed';
                        } elseif ($view->status == 3) {
                            $color = 'bg-success';
                            $text = 'Approved';
                        } else {
                            $color = 'bg-danger';
                            $text = 'Rejected';
                        }
                    @endphp
                    <tr class="bd-l bd-4 bd-danger">
                        <td>{{ $view->employee_name }} - {{ $view->employee_id }}</td>
                        <td>{{ $view->item_id }}</td>
                        <td style="cursor: pointer" onclick ="tampil({{ $view->id }})">{{ $view->item_name }}</td>
                        <td>
                            @if (!empty($view->started_at))
                                {{ date('d F Y', strtotime($view->started_at)) }} s/d
                                {{ date('d F Y', strtotime($view->finished_at)) }}
                            @endif
                        </td>
                        <td>
                            <a href="{{ asset('storage/' . $view->evidence) }}" target="_blank">
                                @if (!empty($view->evidence))
                                    Evidence
                                @endif
                            </a>
                        </td>
                        <td>{{ $view->comment }}</td>
                        <td class="{{ $color }} tx-center" style="cursor: pointer"
                            onclick ="show({{ $view->id }})">
                            {{ $text }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>

    {{-- {{ $data->links() }} --}}

    <div class="modal fade" id="modalUpdate" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header pd-0 pd-t-10 pd-x-10 bg-warning">
                    <h6 class="modal-title tx-uppercase" id="titleModel" style="margin-top: 0px;"></h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div id="form" class="pd-2"></div>
            </div><!-- modal-content -->
        </div><!-- modal-dialog -->
    </div><!-- modal -->
@endsection


@push('scripts')
    <script>
        $(document).ready(function() {
            // viewData();
            $("#viewdata").DataTable();
        })

        function addData() {
            $.get("{{ url('create') }}", {}, function(data, status) {
                $("#titleModel").html('Form Data')
                $("#form").html(data);

                // $('#modalUpdate').modal('show');
                $('#modalUpdate').modal({
                    backdrop: 'static',
                    keyboard: false
                });
            })

        }

        function viewData() {
            $.get("{{ url('read') }}", {}, function(data, status) {

                $("#read").html(data);

            })
        }

        function onprogress() {
            $.get("{{ url('read') }}", {}, function(data, status) {

                $("#read").html(data);

            })
        }

        //proses data
        function store() {
            var item_id = $("#item_id").val();
            $.ajax({
                type: "get",
                url: "{{ url('store') }}",
                data: "item_id=" + item_id,
                success: function(data) {
                    $(".close").click();
                    $("#$modalUpdate").modal('hide');
                }
            })
        }

        function show(id) {
            $.get("{{ url('show') }}/" + id, {}, function(data, status) {
                $("#titleModel").html('Update Status')
                $("#form").html(data);

                // $('#modalUpdate').modal('show');
                $('#modalUpdate').modal({
                    backdrop: 'static',
                    keyboard: false
                });
            })

        }

        //proses data
        function update(id) {
            let status = $("#status").val();
            let item_id = $("#item_id").val();
            let employee_id = $("#employee_id").val();
            $.ajax({
                type: "get",
                url: "{{ url('update') }}/" + id,
                // data: "status=" + status,
                data: {
                    "status": status,
                    "item_id": item_id,
                    "employee_id": employee_id
                },
                success: function(data) {
                    alert("Update data successed!");
                    $(".close").click();
                    // viewData();
                    location.reload();

                }
            })
        }
    </script>
@endpush
