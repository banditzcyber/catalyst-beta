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
            <div class="col-sm-12">
                <h3 class="">
                    Total Data : {{ $countData }}
                </h3 class="tx-uppercase">
            </div>
        </div>
    </div>


    <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
        <div>
            <div class="row ">
                <div class="col-md">
                    <form action="/aldpAdmin">
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


            <div class="form-group row row-xs mg-0">

                <div class="col-sm-2">
                    <a href="/aldpAdmin/create" class="btn btn-sm btn-primary btn-uppercase">
                        <i data-feather="plus" class=""></i>
                    </a>

                </div>

            </div>

        </div>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive">
        <table id="viewdata" class="table table-bordered tx-12 table-hover">
            <thead class="thead-primary tx-uppercase">
                <tr>
                    <th class="w-action-3">#</th>
                    <th>Employee ID</th>
                    <th>Employee Name</th>
                    <th>Section</th>
                    <th>Year</th>
                    <th>Remarks</th>
                    <th style="width: 95px" class="tx-center">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $view)
                    @php

                        if ($view->status == 1) {
                            $color = 'bg-blue tx-center';
                            $text = 'Assigned';
                        } else {
                            $color = 'bg-hijau tx-center';
                            $text = 'Completed';
                        }

                    @endphp
                    <tr>
                        <td class="tx-center">
                            <a href="/aldpAdmin/{{ $view->id }}" class="badge badge-light pd-y-0"><i
                                    data-feather="align-justify" class="wd-15"></i></a>
                            <a href="/aldpAdmin/edit/{{ $view->id }}" class="badge badge-warning pd-y-0"><i
                                    data-feather="edit-2" class="wd-15"></i></a>
                            <form action="/aldpAdmin/{{ $view->id }}" method="post" class="d-inline"
                                onclick="return confirm('Are you sure?')">
                                @method('delete') @csrf
                                <button class="badge badge-danger pd-y-0 border-0">
                                    <i data-feather="x" class="wd-15"></i>
                                </button>
                            </form>
                        </td>
                        <td class="pd-t-25">{{ $view->manager_id }}</td>
                        <td>{{ $view->employee_name }}</td>
                        <td>{{ $view->section }}</td>
                        <td>{{ $view->year }}</td>
                        <td>{{ $view->comment }}</td>
                        <td class="{{ $color }}">{{ $text }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{ $data->links() }}



    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {

        })

        function create() {
            $("#exampleModal").modal('show');
        }
    </script>
@endsection
