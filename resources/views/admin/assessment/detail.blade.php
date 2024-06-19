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
                    <ul class="list-inline d-flex mg-t-20 mg-sm-t-10 mg-md-t-0 mg-b-0">
                        <li class="list-inline-item d-flex align-items-center">
                            <span class="d-block wd-10 ht-10 bg-hijau rounded mg-r-5"></span>
                            <span class="tx-sans tx-uppercase tx-10 tx-medium tx-color-03">(C) Competent</span>
                        </li>
                        <li class="list-inline-item d-flex align-items-center mg-l-5">
                            <span class="d-block wd-10 ht-10 bg-kuning rounded mg-r-5"></span>
                            <span class="tx-sans tx-uppercase tx-10 tx-medium tx-color-03">(N.I) Need Improvement</span>
                        </li>
                        <li class="list-inline-item d-flex align-items-center mg-l-5">
                            <span class="d-block wd-10 ht-10 bg-merah rounded mg-r-5"></span>
                            <span class="tx-sans tx-uppercase tx-10 tx-medium tx-color-03">(N.A) Not Applicable</span>
                        </li>
                    </ul>
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
                    <th>#</th>
                    <th>Item ID</th>
                    <th>Item Name</th>
                    <th>Intervention</th>
                    <th>Type</th>
                    <th>Current</th>
                    <th>Actual</th>
                    <th>Comment</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $view)
                    @php
                        if ($view->assessment_result == 1) {
                            $color = 'bg-hijau';
                            $text = '(C)';
                        } elseif ($view->assessment_result == 2) {
                            $color = 'bg-kuning';
                            $text = '(N.I)';
                        } else {
                            $color = 'bg-merah';
                            $text = '(N.A)';
                        }

                        if ($view->actual_result == 1) {
                            $color2 = 'bg-hijau';
                            $text2 = '(C)';
                        } elseif ($view->assessment_result == 2) {
                            $color2 = 'bg-kuning';
                            $text2 = '(N.I)';
                        } else {
                            $color2 = 'bg-merah';
                            $text2 = '(N.A)';
                        }
                    @endphp
                    <tr>
                        <td class="tx-center">
                            <a onclick="show({{ $view->id }})">
                                <i data-feather="edit-2" class="wd-15"></i>
                            </a>
                        </td>
                        <td>{{ $view->item_id }}</td>
                        <td>{{ $view->item_name }}</td>
                        <td>{{ $view->intervention }}</td>
                        <td>{{ $view->type_training }}</td>
                        <td class="{{ $color }} tx-center">{{ $text }}</td>
                        <td class="{{ $color2 }} tx-center">{{ $text2 }}</td>
                        <td onclick="show({{ $view->id }})">{{ $view->comment }}</td>
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
                    <h6 class="modal-title tx-uppercase" id="titleModel"></h6>
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
    <script nonce="{{ csp_nonce() }}">
        $(document).ready(function() {
            $("#viewdata").DataTable();
        });

        function show(id) {
            $.get("{{ url('edititem') }}/" + id, {}, function(data, status) {
                $("#titleModel").html('Update Data')
                $("#form").html(data);

                $("#modalUpdate").modal({
                    backdrop: 'static',
                    keyboard: false
                });
            });
        }

        function update(id) {
            let assessment_result = $("#assessment_result").val();
            let actual_result = $("#actual_result").val();

            $.ajax({
                type: "get",
                url: "{{ url('updateitem') }}/" + id,
                // data: "status=" + status,
                data: {
                    "assessment_result": assessment_result,
                    "actual_result": actual_result
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
