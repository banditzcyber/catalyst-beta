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

        </div>
    </div>


    <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
        <div>
            <div class="row ">
                <div class="col-md">
                    <form action="/closegap">
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

            <button class="btn btn-sm pd-x-15 btn-white btn-uppercase mg-l-5">
                <i data-feather="send" class="wd-10 mg-r-5"></i>
                Assigned
            </button>
            <a href="/closegap/reviewed" class="btn btn-sm pd-x-15 btn-warning btn-uppercase mg-l-5">
                <i data-feather="refresh-cw" class="wd-10 mg-r-5"></i>
                On-Progress
            </a>
            <a href="/closegap/completed" class="btn btn-sm pd-x-15 btn-primary btn-uppercase mg-l-5">
                <i data-feather="target" class="wd-10 mg-r-5"></i>
                Completed
            </a>

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
                <tr>
                    <th>Employee</th>
                    <th>Item ID</th>
                    <th>Item Name</th>
                    <th>Date</th>
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
                    <tr>
                        <td>({{ $view->employee_id }}) {{ $view->employee_name }}</td>
                        <td>{{ $view->item_id }}</td>
                        <td>{{ $view->item_name }}</td>
                        <td>{{ date('d F Y', strtotime($view->started_at)) }} s/d
                            {{ date('d F Y', strtotime($view->finished_at)) }}</td>
                        <td>{{ $view->comment }}</td>
                        <td class="{{ $color }} tx-center" style="cursor: pointer"
                            onclick="show({{ $view->id }})">
                            {{ $text }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>

    {{ $data->links() }}

    <div class="modal fade" id="modalUpdate" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xs" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="titleModel" style="margin-top: 5px;"></h6>
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
            viewData();
            // $("#viewdata").DataTable();
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
                    // $("#$modalUpdate").modal('hide');
                }
            })
        }

        function show(id) {
            $.get("{{ url('show') }}/" + id, {}, function(data, status) {
                $("#titleModel").html('Edit Data')
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
            var status = $("#status").val();
            $.ajax({
                type: "get",
                url: "{{ url('update') }}/" + id,
                data: "status=" + status,
                success: function(data) {
                    $(".close").click();
                    // viewData();
                    location.reload();

                }
            })
        }
    </script>
@endpush
