@extends('layouts.main') @section('body')
    <div class="mg-t-0 mg-b-5 pd-0">
        <img src="/images/cap/bnr3.jpg" alt="" class="bg-banner">
    </div>
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
            <a href="/sectionAldpShow/{{ $id_aldp }}" class="btn btn-sm pd-x-15 btn-danger btn-uppercase mg-l-5">
                <i data-feather="corner-down-left" class="wd-10 mg-r-5"></i>
                back
            </a>
        </div>
    </div>

    <div class="col-md-8">
        <form id="formInput" action="/sectionAldp/saveForm" method="post" novalidate class="needs-validation">
            @csrf

            <div class="form-group row row-xs">
                <div class="col-sm-3">
                    <input type="hidden" name="aldp_id" id="aldp_id" class="form-control " autofocus
                        value="{{ $id_aldp }}" placeholder="position" readonly />
                </div>
                <div class="col-sm-5">
                    <input type="hidden" name="competency_type" id="competency_type" class="form-control " autofocus
                        value="{{ $comp_type }}" placeholder="position" />
                </div>
            </div>

            <input type="hidden" name="item_id" id="item_id" class="form-control @error('item_id') is-invalid @enderror"
                value="{{ old('item_id') }}" placeholder="item_id" readonly />

            <input type="hidden" name="aldp_detail_id" id="aldp_detail_id" class="form-control @error('aldp_detail_id') is-invalid @enderror"
                value="" placeholder="aldp_detail_id" readonly/>
            @error('aldp_detail_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="form-group row row-xs">
                <label class="col-sm-4 col-form-label">Competency</label>
                <div class="col-sm-8">
                    <div class="input-group">
                        <input type="text" name="competency_name" id="competency_name"
                            class="form-control @error('competency_name') is-invalid @enderror" autofocus
                            value="{{ old('competency_name') }}" placeholder="competency_name" readonly />

                        <div class="input-group-append">
                            <button class="btn btn-outline-light" type="button" data-toggle="modal"
                                data-target="#modalItem">
                                <i data-feather="search" class="wd-15"></i>
                            </button>
                        </div>
                    </div>
                </div>
                @error('competency_name')
                    <div class="invalid-feedback-competency_name">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group row row-xs">
                <label class="col-sm-4 col-form-label">Performance Standard</label>
                <div class="col-sm-8">
                    <textarea name="ps_name" class="form-control @error('ps_name') is-invalid @enderror" id="ps_name" cols="30"
                        rows="4" value="{{ old('ps_name') }}" readonly></textarea>
                    @error('ps_name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                @error('ps_name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group row row-xs">
                <label class="col-sm-4 col-form-label">Learning Item</label>
                <div class="col-sm-8">


                    <textarea name="item_name" class="form-control @error('item_name') is-invalid @enderror" id="item_name" cols="30"
                        rows="4" value="{{ old('item_name') }}" readonly></textarea>
                </div>
                @error('item_name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group row row-xs">
                <label class="col-sm-4 col-form-label">Level/Intervention/Type Training</label>
                <div class="col-sm-2">
                    <input type="text" name="level" id="level" class="form-control " autofocus placeholder="level"
                        readonly />
                </div>
                <div class="col-sm-3">
                    <input type="text" name="intervention" id="intervention" class="form-control " autofocus
                        placeholder="intervention" readonly />
                </div>
                <div class="col-sm-3">
                    <input type="text" name="type_training" id="type_training" class="form-control " autofocus
                        placeholder="type training" readonly />
                </div>
            </div>

            <div class="form-group row row-xs">
                <label class="col-sm-4 col-form-label">Planning</label>
                <div class="col-sm-5">
                    <select class="custom-select" name="planned_month" id="planned_month">
                        <option value="" selected class="tx-italic">--select mount-</option>
                        <option value="January">January</option>
                        <option value="February">February</option>
                        <option value="March">March</option>
                        <option value="April">April</option>
                        <option value="June">June</option>
                        <option value="July">July</option>
                        <option value="August">August</option>
                        <option value="September">September</option>
                        <option value="October">October</option>
                        <option value="November">November</option>
                        <option value="December">December</option>
                    </select>
                    <div class="invalid-feedback-planned_month"></div>
                </div>
                <div class="col-sm-3">
                    <select class="custom-select" name="planned_week" id="planned_week">
                        <option selected value="" class="tx-italic">--select week-</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                    <div class="invalid-feedback-planned_week"></div>
                </div>

            </div>

            <div class="form-group row row-xs">
                <label class="col-sm-4 col-form-label">Comment / Remarks</label>
                <div class="col-sm-8">
                    <textarea name="remarks" class="form-control @error('remarks') is-invalid @enderror" id="remarks" cols="30"
                        rows="3" value="{{ old('remarks') }}"></textarea>
                    @error('remarks')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                @error('remarks')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <h4 class="mg-b-0 tx-spacing--1 mt-4">Add Participant</h4>

            <div class="form-group row row-xs">
                <label class="col-sm-4 col-form-label">Participant</label>
                <div class="col-sm-8">
                    <div class="input-group">
                        <input type="text" name="participant" id="participant"
                            class="form-control" autofocus
                            value="{{ old('participant') }}" placeholder="Participant" readonly />

                        <div class="input-group-append">
                            <button class="btn btn-outline-light" id="btnAddParticipant" type="button" data-content="Input Competency First">
                                <i data-feather="search" class="wd-15"></i>
                            </button>
                        </div>
                    </div>
                    <div class="invalid-feedback-participant"></div>
                </div>
 
            </div>
            <div class="form-group row row-xs d-none" id="part_name">
                <label class="col-sm-4 col-form-label">Participant Name</label>
                <div class="col-sm-8">
                    <textarea name="participant_name" class="form-control" id="participant_name" cols="30"
                        rows="4" value="" readonly required></textarea>
                    <div class="invalid-feedback-ps_name"></div>
                </div>
                <div class="col-sm-4">
                    <input type="hidden" name="employee_id" id="employee_id" class="form-control " autofocus
                        value="" placeholder="id" readonly />
                </div>
                <div class="col-sm-4">
                    <input type="hidden" name="employee_name" id="employee_name" class="form-control " autofocus
                        value="" placeholder="employee_name" readonly />
                </div>
                <div class="col-sm-4">
                    <input type="hidden" name="position" id="position" class="form-control " autofocus
                        value="" placeholder="position" readonly />
                </div>
            </div>

            <div class="form-group row row-xs mg-b-0">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-sm btn-primary">
                        <i data-feather="save" class="wd-10 mg-r-5"></i>
                        Submit Form
                    </button>
                </div>
            </div>
        </form>
    </div>

    {{-- Modal Add Item --}}
    <div class="modal fade" id="modalItem" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">

                <div class="modal-body">
                    <div class="table-responsive">
                        <table id="tableData" class="table table-bordered tx-12 table-hover">

                            <thead>
                                <tr>
                                    <th>Competencies</th>
                                    <th>Performance Standars</th>
                                    <th>Level</th>
                                    <th>Learning Item</th>
                                    <th>Intervention</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data1 as $view)
                                    <tr class="get" item_id="{{ $view->item_id }}"
                                        item_name="{{ $view->item_name }}" ps_name="{{ $view->ps_name }}"
                                        competency_name="{{ $view->competency_name }}" level="{{ $view->level }}"
                                        intervention="{{ $view->intervention }}"
                                        type_training="{{ $view->type_training }}">
                                        <td>{{ $view->competency_name }}</td>
                                        <td>{{ Str::limit($view->ps_name, 100) }}</td>
                                        <td>{{ $view->level }}</td>
                                        <td>{{ $view->item_id }} - {{ $view->item_name }}</td>
                                        <td>{{ $view->intervention }} ({{ $view->type_training }})</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div><!-- modal-body -->
            </div><!-- modal-content -->
        </div><!-- modal-dialog -->
    </div><!-- modal -->

    {{-- Modal Add Participant --}}
    <div class="modal fade" id="modalemployee" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel2" style="margin-top: 5px;">Participant</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pd-sm-t-10 pd-sm-b-10 pd-sm-x-20">

                    <button id="buttonRow">Select All</button>

                    <table id="data_participant" class="table table-bordered"
                        style="width: 100%; font-size: 12px;">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>NAME</th>
                                <th>POSITION</th>
                                <th>SECTION</th>
                                <th>JOBCODE</th>
                            </tr>
                        </thead>
                        <tbody>
                           
                        </tbody>

                    </table>

                </div><!-- modal-body -->
                <div class="modal-footer pd-x-20 pd-y-15">
                    <button type="button" class="btn btn-xs btn-white btnCancelParticipName" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-xs btn-primary btnSaveParticipName">Save</button>
                </div>
            </div><!-- modal-content -->
        </div><!-- modal-dialog -->
    </div><!-- modal -->

    @push('scripts')
        <script nonce="{{ csp_nonce() }}">
            $(document).ready(function() {
                $("#tableData").DataTable({
                    "autoWidth": false
                });


                $('#btnAddParticipant').click(function(e) {
                    e.preventDefault();

                    var aldp_id = $('#aldp_id').val();
                    var competency_type = $('#competency_type').val();
                    var item_id = $('#item_id').val();
                    var competency_name = $('#competency_name').val();

                    if (competency_name.trim() === '') {
                        iziToast.warning({
                            title: 'Warning',
                            message: 'Fill Competency first',
                            position: 'topRight',
                            timeout: 2000,
                        });
                    } 
                    else{
                        // Lakukan Ajax request
                        $.ajax({
                            url: "{{ url('sendData') }}",
                            method: 'GET',
                            data: {
                                aldp_id: aldp_id,
                                competency_type: competency_type,
                                item_id: item_id,
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(response) {
                                
                                $('#data_participant tbody').empty();
                                // Loop untuk memasukkan setiap data employee ke dalam tabel
                                $.each(response.employee, function(index, vemployee) {
                                    var row = '<tr employeeID="' + vemployee.employee_id + '" ' +
                                                    'employeeName="' + vemployee.employee_name + '" ' +
                                                    'position="' + vemployee.position + '" ' +
                                                    'jobcode="' + vemployee.jobcode + '"> ' +
                                                    '<td>' + vemployee.employee_id + '</td> ' +
                                                    '<td>' + vemployee.employee_name + '</td> ' +
                                                    '<td>' + vemployee.position + '</td> ' +
                                                    '<td>' + vemployee.section + '</td> ' +
                                                    '<td>' + vemployee.jobcode + '</td> ' +
                                                '</tr>';
                                    $('#data_participant tbody').append(row);
                                });

                                $("#modalemployee").modal("show");

                                $("#data_participant").DataTable({
                                        autoWidth: false,
                                        retrieve: true,
                                        order: [[1, 'asc']]
                                });

                                $('#buttonRow').click(function () {
                                    $('#data_participant tbody tr').toggleClass('selected');
                                });

                                $('#data_participant tbody').on('click', 'tr', function() {
                                    $(this).toggleClass('selected');
                                });
                            },
                            error: function(xhr, status, error) {
                                console.error(xhr.responseText);
                            }
                        });
                    }
                });



                $('.btnSaveParticipName').click(function() {
                    var selectedRows = $('#data_participant tbody tr.selected');

                    // Memeriksa apakah ada baris yang dipilih
                    if (selectedRows.length > 0) {
                        // Mengosongkan nilai di input dan textarea
                        $('#employee_id').val('');
                        $('#employee_name').val('');
                        $('#position').val('');
                        $('#participant_name').val('');
                        
                        // Array untuk menyimpan data yang akan dimasukkan ke textarea
                        var selectedData = [];
                        var employeeIds = [];
                        var employeeNames = [];
                        var positions = [];
                        
                        selectedRows.each(function(index) {
                            var id = $(this).find('td:nth-child(1)').text().trim();
                            var name = $(this).find('td:nth-child(2)').text().trim();
                            var position = $(this).find('td:nth-child(3)').text().trim();
                            
                            // Format data untuk textarea
                            var rowData = (index + 1) + '. ' + id + ', ' + name + ', ' + position;
                            selectedData.push(rowData);
                            employeeIds.push(id);
                            employeeNames.push(name);
                            positions.push(position);
                        });
                        
                        // Mengisi nilai ke elemen input
                        $('#employee_id').val(employeeIds.join(', '));
                        $('#employee_name').val(employeeNames.join(', '));
                        $('#position').val(positions.join(', '));
                        

                        $('#participant_name').val(selectedData.join('\n'));

                        $('#part_name').removeClass('d-none');
                        $('.btnCancelParticipName').click();
                        $("#modalemployee").modal("hide");

                    } else {
                        $('#employee_id').val('');
                        $('#employee_name').val('');
                        $('#position').val('');
                        $('#participant_name').val('');
                    }
                })

                function generateRandomNumber()
                {
                    return Math.floor(Math.random() * 10000000);
                }

                var randomNumber = generateRandomNumber(); 
                    $('#aldp_detail_id').val(randomNumber);

                $('#formInput').submit(function(event) {
                    event.preventDefault();

                    var formData = $(this).serialize();
                    var url = $(this).attr('action');

                    $.ajax({
                        type: 'POST',
                        url: url,
                        data: formData,
                        dataType: 'json',
                        success: function(response) {
                            window.location.href = '/sectionAldpShow/' + response.id;
                        },
                        error: function(xhr, status, error) {
                            var errors = xhr.responseJSON.errors;
                            if (errors && errors.aldp_detail_id) {
                                iziToast.info({
                                    title: 'Info!',
                                    message: errors.aldp_detail_id[0],
                                    position: 'topRight',
                                    buttons: [
                                        ['<button>Refresh</button>', function (instance, toast) {
                                            var randomNumber = generateRandomNumber();
                                            
                                            $('#aldp_detail_id').val(randomNumber);
                                            
                                            instance.hide({ transitionOut: 'fadeOut' }, toast, 'buttonName');
                                        }, true], 
                                    ]
                                });
                            } else {
                                iziToast.warning({
                                    title: 'Warning!',
                                    message: 'Please Complete it',
                                    position: 'topRight'
                                });
                            }
                        }
                    });
                });
            })


            $(document).on("click", ".get", function(e) {
                $("#item_id").val($(this).attr("item_id"));
                $("#item_name").val($(this).attr("item_name"));
                $("#ps_name").val($(this).attr("ps_name"));
                $("#competency_name").val($(this).attr("competency_name"));
                $("#level").val($(this).attr("level"));
                $("#intervention").val($(this).attr("intervention"));
                $("#type_training").val($(this).attr("type_training"));
                $("#modalItem").modal("hide");
            });


        </script>
    @endpush
@endsection
