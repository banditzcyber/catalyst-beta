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

            @php
                if ($competency_type == 1) {
                    $link = '/closegapfunctional';
                } elseif ($competency_type == 2) {
                    $link = '/closegapleadership';
                } else {
                    $link = '/closegapother';
                }
            @endphp

            <div class="btn-group mg-0" role="group" aria-label="Basic example">
                <a href="{{ $link }}" class="btn btn-sm pd-x-15 btn-uppercase mg-l-5 {{ $all }}">
                    <i data-feather="list" class="wd-10 mg-r-5"></i>

                </a>
                <a href="{{ $link }}/submitted" class="btn btn-sm pd-x-15 btn-uppercase mg-l-5 {{ $submitted }}"
                    data-toggle="tooltip" data-placement="top" title="Tooltip on top">
                    <i data-feather="navigation" class="wd-10 mg-r-5"></i>

                </a>
                <a href="{{ $link }}/preview" class="btn btn-sm pd-x-15 btn-uppercase mg-l-5 {{ $reviewed }}">
                    <i data-feather="refresh-cw" class="wd-10 mg-r-5"></i>

                </a>
                <a href="{{ $link }}/completed" class="btn btn-sm pd-x-15 btn-uppercase mg-l-5 {{ $completed }}">
                    <i data-feather="check-circle" class="wd-10 mg-r-5"></i>

                </a>
            </div>

        </div>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif


    <div class="table-responsive">
        {{-- <div id="read"></div> --}}
        <table id="viewdata" class="table table-bordered tx-12 table-hover">
            <thead class="thead-primary tx-uppercase">
                <tr class="bd-l bd-4 bd-danger">
                    {{-- <th class="d-none">id</th> --}}
                    <th>Employee</th>
                    <th>Item Name</th>
                    <th>Date started</th>
                    <th>Date finished</th>
                    {{-- <th>Doc</th> --}}
                    <th>Comment</th>
                    <th>Evidence</th>
                    <th>Status</th>
                </tr>
            </thead>
            {{-- <tbody>
                @foreach ($data as $view)
                    @php
                        if ($view->status == 1) {
                            $color = 'bg-light';
                            $text = 'Submitted';
                        } elseif ($view->status == 2) {
                            $color = 'bg-warning';
                            $text = 'Reviewed';
                        } elseif ($view->status == 3) {
                            $color = 'bg-success';
                            $text = 'Approved';
                        } else {
                            $color = 'bg-danger';
                            $text = 'Rejected';
                        }
                    @endphp

                    <tr class="bd-l bd-4 bd-danger">
                        <td>{{ $view->employee_name }} - {{ $view->employee_id }}</td>
                        <td onclick ="tampil({{ $view->id }})">{{ $view->item_name }}</td>
                        <td>
                            @if (!empty($view->started_at))
                                {{ date('d F Y', strtotime($view->started_at)) }} s/d
                                {{ date('d F Y', strtotime($view->finished_at)) }}
                            @endif
                        </td>
                        <td>
                            <a href="{{ asset('storage/' . $view->evidence) }}" target="_blank">
                                @if (!empty($view->evidence))
                                    Evidence
                                @endif
                            </a>
                        </td>
                        <td>{{ $view->comment }}</td>
                        <td class="{{ $color }} tx-center show-modal pointer" data-id="{{ $view->id }}">
                            {{ $text }}
                        </td>
                        <td>{{ $view->competency_type}}</td>
                    </tr>
                @endforeach
            </tbody> --}}
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

            var competencyType = {{ $competency_type }};
            var status = {{ $status }};
            var ajaxUrl;

            if (competencyType === 1) {
                if (status === 0) {
                    ajaxUrl = '/closegapfunctional';
                } else if (status === 1) {
                    ajaxUrl = '/closegapfunctional/submitted';
                } else if (status === 2) {
                    ajaxUrl = '/closegapfunctional/preview';
                } else if (status === 3) {
                    ajaxUrl = '/closegapfunctional/completed';
                }
            } else if (competencyType === 2) {
                if (status === 0) {
                    ajaxUrl = '/closegapleadership';
                } else if (status === 1) {
                    ajaxUrl = '/closegapleadership/submitted';
                } else if (status === 2) {
                    ajaxUrl = '/closegapleadership/preview';
                } else if (status === 3) {
                    ajaxUrl = '/closegapleadership/completed';
                }
            } else if (competencyType === 3) {
                if (status === 0) {
                    ajaxUrl = '/closegapother';
                } else if (status === 1) {
                    ajaxUrl = '/closegapother/submitted';
                } else if (status === 2) {
                    ajaxUrl = '/closegapother/preview';
                } else if (status === 3) {
                    ajaxUrl = '/closegapother/completed';
                }
            }


            // viewData();
            $("#viewdata").DataTable({
                processing: true,
                serverSide: true,
                ajax: ajaxUrl,
                columns: [{
                        data: 'employee_name',
                        name: 'e.employee_name'
                    },
                    {
                        data: 'item_name',
                        name: 'i.item_name',
                        render: function(data, type, row) {
                            // Memisahkan teks berdasarkan pola nomor di awal (angka diikuti oleh titik dan spasi)
                            let items = data.split(/(\d+\.\s+)/);
                            let html = '';

                            // Loop melalui setiap bagian yang dipisahkan
                            for (let i = 0; i < items.length; i++) {
                                // Jika bagian merupakan angka diikuti oleh titik dan spasi
                                if (/^\d+\.\s+$/.test(items[i])) {
                                    html += `<div>${items[i]}${items[i+1]}</div>`;
                                    i++; // Melompati teks yang mengikuti angka di depannya
                                } else {
                                    html += `<div>${items[i]}</div>`;
                                }
                            }

                            return html;
                        }
                    },
                    {
                        data: 'started_at',
                        name: 'l.started_at',
                    },
                    {
                        data: 'finished_at',
                        name: 'l.finished_at'
                    },
                    {
                        data: 'comment',
                        name: 'l.comment'
                    },
                    {
                        data: 'evidence',
                        name: 'l.evidence'
                    },
                    {
                        data: 'status',
                        name: 'l.status',
                        render: function(data, type, row) {
                            let color, text;
                            if (data == 1) {
                                color = 'bg-light';
                                text = 'Submitted';
                            } else if (data == 2) {
                                color = 'bg-warning';
                                text = 'Reviewed';
                            } else if (data == 3) {
                                color = 'bg-success';
                                text = 'Approved';
                            } else {
                                color = 'bg-danger';
                                text = 'Rejected';
                            }
                            return `<div class="tx-center show-modal pointer" data-id="${row.id}">${text}</div>`;
                        }
                    },
                ],
                createdRow: function(row, data, dataIndex) {
                    $(row).find('td:eq(6)').addClass(data.status === 1 ? 'bg-light pointer show-modal' :
                        (data.status === 2 ? 'bg-warning text-white pointer show-modal' : (data
                            .status === 3 ? 'bg-success text-white pointer show-modal' :
                            'bg-danger text-white pointer show-modal')));
                    const modalBtn = $(row).find('.show-modal');
                    modalBtn.attr('data-id', data.id);
                }
            });
        })

        function addData() {
            $.get("{{ url('create') }}", {}, function(data, status) {
                $("#titleModel").html('Form Data')
                $("#form").html(data);

                // $('#modalUpdate').modal('show');
                $('#modalUpdate').modal({
                    backdrop: 'static',
                    keyboard: false
                });
            })

        }

        function viewData() {
            $.get("{{ url('read') }}", {}, function(data, status) {

                $("#read").html(data);

            })
        }

        function onprogress() {
            $.get("{{ url('read') }}", {}, function(data, status) {

                $("#read").html(data);

            })
        }

        //proses data
        function store() {
            var item_id = $("#item_id").val();
            $.ajax({
                type: "get",
                url: "{{ url('store') }}",
                data: "item_id=" + item_id,
                success: function(data) {
                    $(".close").click();
                    $("#$modalUpdate").modal('hide');
                }
            })
        }

        $(document).on('click', '.show-modal', function() {
            const id = $(this).data('id');
            show(id);
        });

        function show(id) {
            $.get("{{ url('show') }}/" + id, {}, function(data, status) {
                $("#titleModel").html('Update Status')
                $("#form").html(data);

                // $('#modalUpdate').modal('show');
                $('#modalUpdate').modal({
                    backdrop: 'static',
                    keyboard: false
                });
            })

        }


        //For Update//
        //trigger button update from update.blade.php
        $(document).on('updateButtonClicked', function(event, data) {
            //Get data-id from update.blade.php
            var id = data.id;
            update(id);

            //proses data
            function update(id) {
                let status = $("#status").val();
                let item_id = $("#item_id").val();
                let employee_id = $("#employee_id").val();
                $.ajax({
                    type: "get",
                    url: "{{ url('update') }}/" + id,
                    // data: "status=" + status,
                    data: {
                        "status": status,
                        "item_id": item_id,
                        "employee_id": employee_id
                    },
                    success: function(data) {
                        iziToast.success({
                            title: 'Success',
                            timeout: 2200,
                            message: 'Update status berhasil!',
                            position: 'topRight'
                        });
                        $(".close").click();
                        $('#viewdata').DataTable().ajax.reload();
                    }
                })
            }
        })
    </script>
@endpush
