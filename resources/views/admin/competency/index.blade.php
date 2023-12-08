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


            <div class="form-group row row-xs mg-0">
                <div class="col-sm-10">
                    <form action="competency/import-data" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="search-form input-group">
                            <input type="file" class="form-control tx-11" name="file" id="file"
                                accept=".xlsx,.xlsx" placeholder="" required>
                            <button class="btn btn-xs pd-x-15 btn-primary" type="submit">
                                IMPORT
                            </button>
                        </div>
                    </form>

                </div>

                <div class="col-sm-2">
                    <a href="/competency/create" class="btn btn-sm btn-primary btn-uppercase">
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
                    <th style="width: 75px">#</th>
                    <th style="width: 100px">ID</th>
                    <th>Area</th>
                    <th>Type</th>
                    <th>Name</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $view)
                    <tr>
                        <td class="tx-center">
                            <a href="/competency/{{ $view->competency_id }}/edit" class="badge badge-warning pd-y-0"><i
                                    data-feather="edit-2" class="wd-15"></i></a>
                            <form action="/competency/{{ $view->competency_id }}" method="post" class="d-inline"
                                onclick="return confirm('Are you sure?')">
                                @method('delete') @csrf
                                <button class="badge badge-danger pd-y-0 border-0">
                                    <i data-feather="x" class="wd-15"></i>
                                </button>
                            </form>
                        </td>
                        <td class="pd-t-25">{{ $view->competency_id }}</td>
                        <td>{{ $view->competency_area }}</td>
                        <td>{{ $view->competency_type }}</td>
                        <td>{{ $view->competency_name }}</td>
                        <td>{{ $view->description }}</td>
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

    @push('scripts')
        <script>
            function addData() {
                $.get("{{ url('formCompetency') }}", {}, function(data, status) {
                    $("#titleModel").html('Update Data')
                    $("#form").html(data);

                    // $('#modalUpdate').modal('show'); 
                    $('#modalUpdate').modal({
                        backdrop: 'static',
                        keyboard: false
                    });
                })
            }

            function saveData() {
                const competency_id = $('#competency_id').val();
                const competency_area = $('#competency_area').val();
                const competency_type = $('#competency_type').val();
                const competency_name = $('#competnecy_name').val();
                const competency_bahasa = $('#competency_bahasa').val();
                const description = $('#description').val();
                const description_bahasa = $('#description_bahasa').val();


            }
        </script>
    @endpush
@endsection
