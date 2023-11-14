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
            <a href="/aldpAdmin" class="btn btn-sm pd-x-15 btn-danger btn-uppercase mg-l-5">
                <i data-feather="corner-down-left" class="wd-10 mg-r-5"></i>
                back
            </a>
        </div>
    </div>

    <div class="col-md-8">
        <form action="/aldpAdmin" method="post">
            @csrf

            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Manager ID</label>
                <div class="col-sm-3">
                    <input type="text" name="aldp_id" id="aldp_id" class="form-control " autofocus
                        value="{{ $id_aldp }}" placeholder="position" readonly />
                </div>
                <div class="col-sm-5">
                    <input type="text" name="competency_type" id="competency_type" class="form-control " autofocus
                        value="1" placeholder="position" readonly />
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Item ID</label>
                <div class="col-sm-8">
                    <div class="input-group">
                        <input type="text" class="form-control @error('item_id') is-invalid @enderror"
                            placeholder="Search..." name="item_id" id="item_id" value="{{ old('item_id') }}" readonly />
                        <div class="input-group-append">
                            <button class="btn btn-outline-light" type="button" data-toggle="modal"
                                data-target="#modalItem">
                                <i data-feather="search" class="wd-15"></i>
                            </button>
                        </div>
                    </div>
                </div>
                @error('item_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Performance Standard</label>
                <div class="col-sm-8">
                    <textarea name="ps_name" class="form-control @error('ps_name') is-invalid @enderror" id="ps_name" cols="30"
                        rows="3" name="desc" value="{{ old('ps_name') }}"></textarea>
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

            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Competency</label>
                <div class="col-sm-8">
                    <input type="text" name="competency_name" id="competency_name"
                        class="form-control @error('competency_name') is-invalid @enderror" autofocus
                        value="{{ old('competency_name') }}" placeholder="competency_name" readonly />
                </div>
                @error('jobcode')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Planning</label>
                <div class="col-sm-5">
                    <select class="custom-select" name="planning_month" id="planning_month">
                        <option selected class="tx-italic">--select mount-</option>
                        <option value="January">January</option>
                        <option value="Pebruary">Pebruary</option>
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
                </div>
                <div class="col-sm-3">
                    <select class="custom-select" name="planning_week" id="planning_week">
                        <option selected class="tx-italic">--select week-</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>

                @error('year')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Comment / Remarks</label>
                <div class="col-sm-8">
                    <textarea name="comment" class="form-control @error('comment') is-invalid @enderror" id="comment" cols="30"
                        rows="3" name="desc" value="{{ old('comment') }}"></textarea>
                    @error('comment')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                @error('comment')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>


            <div class="form-group row mg-b-0">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-sm btn-primary">
                        <i data-feather="save" class="wd-10 mg-r-5"></i>
                        Submit Form
                    </button>
                </div>
            </div>
        </form>
    </div>



    @push('scripts')
        <script>
            $(document).ready(function() {
                $("#data_detail").DataTable();
            });

            $(document).on("click", ".get", function(e) {
                $("#manager_id").val($(this).attr("employeeId"));
                $("#employee_name").val($(this).attr("employeeName"));
                $("#position").val($(this).attr("position"));
                $("#jobcode").val($(this).attr("jobcode"));
                $("#modalemployee").modal("hide");
            });
        </script>
    @endpush
@endsection
