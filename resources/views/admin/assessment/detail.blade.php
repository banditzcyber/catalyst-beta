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
            @foreach ($employee as $vEmployee)
                <h5 class="mg-b-0 tx-spacing--">{{ $vEmployee->employee_name }}</h5>
                <p class="tx-13">{{ $vEmployee->position }}</p>
            @endforeach
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
                    <form action="/assessmentAdmin/show">
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
                <div class="col-sm-12">
                    <form action="/assessment/importData" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="assessment_id" id="assessment_id" value="{{ $id }}">
                        <div class="search-form input-group">
                            <input type="file" class="form-control tx-11" name="file" id="file"
                                accept=".xlsx,.xlsx" placeholder="" required>
                            <button class="btn btn-xs pd-x-15 btn-dark btn-uppercase" type="submit">
                                IMPORT
                            </button>
                        </div>
                    </form>

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
                    <th style="width: 45px">#</th>
                    <th>ID</th>
                    <th>Item ID</th>
                    <th>Item Name</th>
                    <th>Intervention</th>
                    <th>Type</th>
                    <th style="width: 115px">Current</th>
                    <th style="width: 115px">Actual</th>
                    <th>Comment</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $view)
                    @php
                        if ($view->assessment_result == 1) {
                            $color = 'bg-hijau';
                            $text = 'Competent';
                        } elseif ($view->assessment_result == 2) {
                            $color = 'bg-kuning';
                            $text = 'Need Improvement';
                        } else {
                            $color = 'bg-merah';
                            $text = 'Not Applicable';
                        }

                        if ($view->actual_result == 1) {
                            $color2 = 'bg-hijau';
                            $text2 = 'Competent';
                        } elseif ($view->assessment_result == 2) {
                            $color2 = 'bg-kuning';
                            $text2 = 'Need Improvement';
                        } else {
                            $color2 = 'bg-merah';
                            $text2 = 'Not Applicable';
                        }
                    @endphp
                    <tr>
                        <td class="tx-center">
                            <a href="#" onclick="show({{ $view->id }})">
                                <i data-feather="edit-2" class="wd-15"></i>
                            </a>
                        </td>
                        <td class="pd-t-25">{{ $view->id }}</td>
                        <td class="pd-t-25">{{ $view->item_id }}</td>
                        <td class="pd-t-25">{{ $view->item_name }}</td>
                        <td>{{ $view->intervention }}</td>
                        <td>{{ $view->type_training }}</td>
                        <td class="{{ $color }}">{{ $text }}</td>
                        <td class="{{ $color2 }}">{{ $text2 }}</td>
                        <td>{{ $view->comment }}</td>
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

@push('script')
    <script>
        $(document).ready(function() {
            viewdData();
        });

        function show(id) {
            $.get("{{ url('show') }}/" + id, {}, function(data, status) {
                $("#titleModel").html('Update Data')
                $("$form").html(data);

                $("#modalUPdate").modal({
                    backdrop: 'static',
                    keyboard: false
                });
            });
        }
    </script>
@endpush
