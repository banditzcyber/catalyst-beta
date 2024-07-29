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
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
        </div>
    @endif
    @if (session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
        </div>
    @endif


    <div class="table-responsive">
        <table id="viewdata" class="table table-bordered tx-12 table-hover">
            <thead class="thead-primary tx-uppercase">
                <tr>
                    <th class="w-action-4">#</th>
                    <th>CDXAA</th>
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
                            <a href="#" class="badge badge-danger pd-y-0 btnModal" data-toggle="modal" data-target="#deleteModal" data-id='{{ $view->id }}'><i
                                    data-feather="x" class="wd-15"></i></a>
                            {{-- <form action="/assessmentAdmin/{{ $view->id }}" method="post" class="d-inline delete-form" data-id='{{ $view->id }}'>
                                @method('delete') @csrf
                                <button class="badge badge-danger pd-y-0 border-0">
                                    <i data-feather="x" class="wd-15"></i>
                                </button>
                            </form> --}}
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

    {{-- Modal Delete --}}
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel5" aria-hidden="true">
        <div class="modal-dialog modal-sm" data-backdrop="static" data-bs-keyboard="false" role="document">
          <div class="modal-content tx-14">
            <div class="modal-header">
              <h6 class="modal-title" id="exampleModalLabel5">Are you sure?</h6>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p class="mg-b-0">Are you sure you want to delete?</p>
            </div>
            <div class="modal-footer">
                <form id="deleteForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-secondary tx-13" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger tx-13" id="confirmDeleteButton">Delete</button>
                </form>
            </div>
          </div>
        </div>
      </div>
    {{-- End Modal Delete --}}

    {{-- {{ $data->links() }} --}}
@endsection

@push('scripts')
    <script nonce="{{ csp_nonce() }}">
        $(document).ready(function() {
            $("#viewdata").DataTable();

            let deleteUrl;

            // Show modal and set delete URL
            $('.btnModal').click(function() {
                var id = $(this).data('id');
                deleteUrl = '/assessmentAdmin/' + id;
                $('#deleteForm').attr('action', deleteUrl);
            });

            // Submit the form via AJAX
            $('#deleteForm').on('submit', function(e) {
                e.preventDefault(); // Prevent default form submission

                $.ajax({
                    url: deleteUrl,
                    type: 'POST',
                    data: $(this).serialize(), // Serialize form data
                    success: function(response) {
                        // Handle success response
                        iziToast.success({
                            title: 'Success',
                            timeout: 2000,
                            message: 'Data has been deleted!',
                            position: 'topRight'
                        });
                        $(".close").click();
                        setTimeout(() => {
                            location.reload();
                        }, 1700);
                    },
                    error: function(xhr) {
                        // Handle error
                        alert('Error: ' + xhr.responseText);
                    }
                });
            });
        });
    </script>
@endpush
