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
                    Total Data : {{ number_format($countData) }}
                </h3 class="tx-uppercase">
            </div>
        </div>

    </div>

    <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
        <div>
            <div class="row ">
                <div class="col-md">
                    <form action="/items">
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
                <div class="col-sm-10">
                    <form action="items/importData" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="search-form input-group">
                            <input type="file" class="form-control tx-11" name="file" id="file"
                                accept=".xlsx,.xlsx" placeholder="" required>
                            <button class="btn btn-xs pd-x-15 btn-primary btn-uppercase" type="submit">
                                IMPORT
                            </button>
                        </div>
                    </form>

                </div>

                <div class="col-sm-2">
                    <a href="#" class="btn btn-sm btn-primary btn-uppercase">
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
            <thead class="thead-primary">
                <tr>
                    <th class="w-action-2">#</th>
                    <th>ID</th>
                    <th>Item Name</th>
                    <th>Intervention</th>
                    <th>Type</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $view)
                    <tr>
                        <td class="tx-center">
                            <a href="/itemEdits/{{ $view->item_id }}" class="badge badge-warning pd-y-0"><i
                                    data-feather="edit-2" class="wd-15"></i></a>
                            <form action="/items/{{ $view->item_id }}" method="post" class="d-inline"
                                onclick="return confirm('Are you sure?')">
                                @method('delete') @csrf
                                <button class="badge badge-danger pd-y-0 border-0">
                                    <i data-feather="x" class="wd-15"></i>
                                </button>
                            </form>
                        </td>
                        <td class="pd-t-25">{{ $view->item_id }}</td>
                        <td>{{ $view->item_name }}</td>
                        <td>{{ $view->intervention }}</td>
                        <td>{{ $view->type_training }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{ $data->links() }}
@endsection
