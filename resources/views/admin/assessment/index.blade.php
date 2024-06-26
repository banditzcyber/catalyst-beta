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


                <button class="btn btn-sm btn-uppercase tx-18">
                    Total Data : {{ $countData }}
                </button>
                <a href="/assessmentAdmin/create" class="btn btn-sm btn-white btn-uppercase">
                    <i data-feather="plus" class=""></i> Add Data
                </a>

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
                    <th>#</th>
                    <th>CDX</th>
                    <th>ID</th>
                    <th>Employee Name</th>
                    <th>Position</th>
                    <th>Jobcode</th>
                    <th>Year</th>
                    <th class="tx-center">Status</th>
                    <th class="tx-center">Launch</th>
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
                            <form action="/assessmentAdmin/{{ $view->id }}" method="post" class="d-inline">
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

    {{-- {{ $data->links() }} --}}
@endsection

@push('scripts')
    <script nonce="{{ csp_nonce() }}">
        $(document).ready(function() {
            $("#viewdata").DataTable();
        });
    </script>
@endpush
