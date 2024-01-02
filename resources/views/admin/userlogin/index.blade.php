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
            <button class="btn btn-sm pd-x-15 btn-white btn-uppercase mg-l-5">
                <i data-feather="share" class="wd-10 mg-r-5"></i>
                Upload Data
            </button>
            <a href="/userlogin/create" class="btn btn-sm pd-x-15 btn-primary btn-uppercase mg-l-5">
                <i data-feather="file" class="wd-10 mg-r-5"></i>
                Add New Data
            </a>
        </div>
    </div>

    <div class="row mg-b-10 justify-content-right">
        <div class="col-md-4">
            <form action="/userlogin">
                <div class="input-group">
                    <input type="text" class="form-control tx-12" placeholder="Search..." name="search"
                        value="{{ request('search') }}">
                    <div class="input-group-append">
                        <button class="btn btn-outline-light btn-sm" type="submit" id="button-addon2">
                            <i data-feather="search" class="wd-15"></i>
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
                    <th style="width: 75px">#</th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $view)
                    @php
                        if ($view->role_id == 1) {
                            $text = 'Employee';
                        } elseif ($view->role_id == 2) {
                            $text = 'Section';
                        } elseif ($view->role_id == 3) {
                            $text = 'Department';
                        } elseif ($view->role_id == 4) {
                            $text = 'General';
                        } elseif ($view->role_id == 5) {
                            $text = 'Adm. Functional';
                        } elseif ($view->role_id == 6) {
                            $text = 'Root';
                        }
                    @endphp


                    <tr>
                        <td class="tx-center">
                            <a href="/userlogin/edit/{{ $view->id }}" class="badge badge-warning pd-y-0"><i
                                    data-feather="edit-2" class="wd-15"></i></a>
                            <form action="/userlogin/{{ $view->id }}" method="post" class="d-inline"
                                onclick="return confirm('Are you sure?')">
                                @method('delete') @csrf
                                <button class="badge badge-danger pd-y-0 border-0">
                                    <i data-feather="x" class="wd-15"></i>
                                </button>
                            </form>
                        </td>
                        <td>{{ $view->employee_id }}</td>
                        <td>{{ $view->employee_name }}</td>
                        <td>{{ $view->email }}</td>
                        <td>{{ $text }}</td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{ $data->links() }}
@endsection
