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

            </div>
        </div>

    </div>

    <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
        <div>
            <div class="row ">
                <div class="col-md">
                    <h3 class="">
                        Total Data : {{ number_format($countData) }}
                    </h3 class="tx-uppercase">
                </div>
            </div>
        </div>
        <div class="d-none d-md-block">


            <div class="form-group row row-xs mg-0">
                <div class="col-sm-10">
                    <form action="matrix/importData" method="post" enctype="multipart/form-data">
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
                    <a href="/matrix/create" class="btn  btn-primary btn-uppercase">
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
        <table id="viewdata" class="table table-bordered tx-12 table-hover pd-0">
            <thead class="thead-primary">
                <tr>
                    <th class="w-action-2">#</th>
                    <th>Section</th>
                    <th>Competency</th>
                    <th>Position</th>
                    <th>Job Code</th>
                    <th>Target</th>
                    <th>Position (F)</th>
                    <th>Job Code (F)</th>
                    <th>Target(F)</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $view)
                    <tr>
                        <td class="tx-center">
                            <a href="/matrix/edit/{{ $view->id }}/" class="badge badge-warning pd-y-0"><i
                                    data-feather="edit-2" class="wd-15"></i></a>
                            <form action="/matrix/{{ $view->id }}" method="post" class="d-inline"
                                onclick="return confirm('Are you sure?')">
                                @method('delete') @csrf
                                <button class="badge badge-danger pd-y-0 border-0">
                                    <i data-feather="x" class="wd-15"></i>
                                </button>
                            </form>
                        </td>
                        <td>{{ $view->section }}</td>
                        <td>[{{ $view->competency_id }}] {{ $view->competency_name }}</td>
                        <td>
                            {{ $view->position }}
                            ({{ $view->position_title }})
                        </td>
                        <td>{{ $view->jobcode }}</td>
                        <td>{{ $view->level }}</td>
                        <td>
                            {{ $view->position_future }}
                            ({{ $view->position_title_future }})
                        </td>
                        <td>{{ $view->jobcode_future }}</td>
                        <td>{{ $view->level_future }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="modal fade" id="modalInport" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel2" style="margin-top: 5px;">Modal Title</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pd-sm-t-10 pd-sm-b-10 pd-sm-x-20">



                </div><!-- modal-body -->
                <div class="modal-footer pd-x-20 pd-y-15">
                    <button type="button" class="btn btn-xs btn-white" data-dismiss="modal">Cancel</button>
                    <button type="button" onclick="save()" class="btn btn-xs btn-primary btnSave">Save</button>
                </div>
            </div><!-- modal-content -->
        </div><!-- modal-dialog -->
    </div><!-- modal -->

    {{-- {{ $data->links() }} --}}
@endsection

@push('scripts')
    <script nonce="{{ csp_nonce() }}">
        $(document).ready(function() {
            $("#viewdata").DataTable();
        });
    </script>
@endpush;
