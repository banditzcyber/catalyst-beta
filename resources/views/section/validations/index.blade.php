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

    @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive">
        <table id="viewdata" class="table table-bordered tx-12 table-hover">
            <thead class="thead-primary">
                <tr>
                    <th style="width: 85px">#</th>
                    <th style="width: 90px">ID</th>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Years</th>
                    <th>Created at</th>
                    <th>Updated at</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $view)
                    @php

                        if (empty($view->created_at)) {
                            $tgl_create = '-';
                        } else {
                            $dCreate = new DateTimeImmutable($view->created_at);
                            $tgl_create = $dCreate->format('D, j F Y');
                        }

                        if (empty($view->updated_at)) {
                            $tgl_update = '-';
                        } else {
                            $dUpdate = new DateTimeImmutable($view->created_at);
                            $tgl_update = $dUpdate->format('D, j F Y');
                        }

                        if ($view->status == 1) {
                            $color = 'bg-light';
                            $text = 'Self Assessment';
                            $btn = 'disabled="disabled"';
                            $btnColor = 'badge-primary';
                        } elseif ($view->status == 2) {
                            $color = 'bg-warning';
                            $text = 'Review by Superior';
                            $btn = '';
                            $btnColor = 'badge-primary';
                        } else {
                            $color = 'bg-success';
                            $text = 'Completed';
                            $btn = 'disabled="disabled"';
                            $btnColor = 'badge-light';
                        }
                    @endphp

                    <tr>
                        <td class="tx-center">
                            <a href="/assessmentValidation/show/{{ $view->id }}" class="badge badge-warning pd-y-0"><i
                                    data-feather="eye" class="wd-15"></i></a>

                            <form action="/finishFormValidation" method="POST" onclick="return confirm('Are you sure?')"
                                class="d-inline">
                                @csrf
                                <input type="hidden" name="assessment_id" value="{{ $view->id }}">
                                <button class="badge  pd-y-0 border-0  {{ $btnColor }}" {{ $btn }}
                                    title="update status"><i data-feather="arrow-up-circle" class="wd-15"></i></button>
                            </form>
                        </td>
                        <td class="pd-t-25">{{ $view->employee_id }}</td>
                        <td>{{ $view->employee_name }}</td>
                        <td>{{ $view->position }}</td>
                        <td>{{ $view->year }}</td>
                        <td class="tx-center">{{ $tgl_create }}</td>
                        <td class="tx-center">{{ $tgl_update }}</td>
                        <td class="{{ $color }} tx-center" style="cursor: pointer"
                            onclick="show({{ $view->id }})">
                            {{ $text }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- {{ $data->links() }} --}}

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
            $(document).ready(function() {
                $("#viewdata").DataTable();
            });

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
