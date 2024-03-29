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
                    <form action="/assessmentAdmin">
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
                    <a href="/assessmentAdmin/create" class="btn btn-sm btn-primary btn-uppercase">
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
    @if (session()->has('danger'))
        <div class="alert alert-danger" role="alert">
            {{ session('danger') }}
        </div>
    @endif


    <div class="table-responsive">
        <table id="viewdata" class="table table-bordered tx-12 table-hover">
            <thead class="thead-primary tx-uppercase">
                <tr>
                    <th style="width: 135px">#</th>
                    <th>CDX</th>
                    <th>ID</th>
                    <th>Employee Name</th>
                    <th>Position</th>
                    <th>Jobcode</th>
                    <th>Year</th>
                    <th style="width: 130px" class="tx-center">Status</th>
                    <th style="width: 95px" class="tx-center">Launch</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $view)
                    @php

                        if ($view->status == 1) {
                            $color = 'bg-blue';
                            $text = 'Self Assessment';
                        } elseif ($view->status == 2) {
                            $color = 'bg-kuning';
                            $text = 'Review by Superior';
                        } else {
                            $color = 'bg-hijau';
                            $text = 'Completed';
                        }

                        if ($view->status_launch == 1) {
                            $color2 = 'bg-hijau';
                            $text2 = 'Actived';
                        } else {
                            $color2 = 'bg-secondary';
                            $text2 = 'Not Actived';
                        }

                    @endphp
                    <tr>
                        <td class="tx-center">
                            <a href="/assessmentAdmin/profile/{{ $view->employee_id }}" class="badge badge-info pd-y-0"
                                title="dashboard"><i data-feather="eye" class="wd-15"></i></a>
                            <a href="/assessmentAdmin/show/{{ $view->id }}" class="badge badge-light pd-y-0"><i
                                    data-feather="align-justify" class="wd-15"></i></a>
                            <a href="/assessmentAdmin/edit/{{ $view->id }}" class="badge badge-warning pd-y-0"><i
                                    data-feather="edit-2" class="wd-15"></i></a>
                            <form action="/assessmentAdmin/{{ $view->id }}" method="post" class="d-inline"
                                onclick="return confirm('Are you sure?')">
                                @method('delete') @csrf
                                <button class="badge badge-danger pd-y-0 border-0">
                                    <i data-feather="x" class="wd-15"></i>
                                </button>
                            </form>
                        </td>
                        <td class="pd-t-25 tx-center">{{ $view->id }}</td>
                        <td class="pd-t-25">{{ $view->employee_id }}</td>
                        <td>{{ $view->employee_name }}</td>
                        <td>{{ $view->position }}</td>
                        <td>{{ $view->jobcode }}</td>
                        <td>{{ $view->year }}</td>
                        <td class="{{ $color }} tx-center">{{ $text }}</td>
                        <td class="{{ $color2 }} tx-center">{{ $text2 }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{ $data->links() }}
@endsection
