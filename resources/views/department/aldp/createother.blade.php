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
            <a href="/aldpSection/{{ $id_aldp }}" class="btn btn-sm pd-x-15 btn-danger btn-uppercase mg-l-5">
                <i data-feather="corner-down-left" class="wd-10 mg-r-5"></i>
                back
            </a>
        </div>
    </div>

    <div class="col-md-8">
        <form action="/departAldp/saveFormOther" method="post">
            @csrf

            <div class="form-group row row-xs">
                <div class="col-sm-3">
                    <input type="hidden" name="aldp_id" id="aldp_id" class="form-control " autofocus
                        value="{{ $id_aldp }}" placeholder="position" readonly />
                </div>
                <div class="col-sm-5">
                    <input type="hidden" name="competency_type" id="competency_type" class="form-control " autofocus
                        value="3" placeholder="position" readonly />
                </div>
                <div class="col-sm-5">
                    <input type="hidden" name="item_id" id="item_id" class="form-control " autofocus value="1"
                        placeholder="position" readonly />
                </div>
            </div>


            <div class="form-group row row-xs">
                <label class="col-sm-4 col-form-label">Item Name</label>
                <div class="col-sm-8">
                    <input type="text" name="item_name" id="item_name"
                        class="form-control @error('item_name') is-invalid @enderror" value="{{ old('item_name') }}"
                        placeholder="item_name" />
                </div>
                @error('item_name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>


            <div class="form-group row row-xs">
                <label class="col-sm-4 col-form-label">Planning</label>
                <div class="col-sm-5">
                    <select class="custom-select" name="planned_month" id="planned_month">
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
                    <select class="custom-select" name="planned_week" id="planned_week">
                        <option selected class="tx-italic">--select week-</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>


                @error('planning_week')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
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



    @push('scripts')
        <script>
            $(document).ready(function() {
                $("#tableData").DataTable();
            });

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
