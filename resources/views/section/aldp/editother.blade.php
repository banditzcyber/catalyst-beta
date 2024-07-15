@extends('layouts.main') @section('body')
    <div class="mg-t-0 mg-b-15 pd-0">
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
        <form action="/sectionAldp/updateOther" method="post">
            @csrf

            <div class="form-group row row-xs">
                <div class="col-sm-3">
                    <input type="hidden" name="aldp_detail_id" id="aldp_detail_id" class="form-control " autofocus
                        value="{{ $data->id }}" placeholder="position" readonly />
                </div>
                <div class="col-sm-5">
                    <input type="hidden" name="aldp_id" id="aldp_id" class="form-control " autofocus
                        value="{{ $data->aldp_id }}" placeholder="position" readonly />
                </div>
            </div>
            <input type="hidden" class="form-control @error('item_id') is-invalid @enderror" placeholder="Search..."
                name="item_id" id="item_id" value="{{ old('item_id', $data->item_id) }}" readonly />

            <div class="form-group row row-xs">
                <label class="col-sm-4 col-form-label">Learning Item</label>
                <div class="col-sm-8">

                    <textarea name="item_name" class="form-control @error('item_name') is-invalid @enderror" id="item_name" cols="30"
                        rows="3" name="desc" value="{{ old('item_name') }}">{{ $data->item_name }}</textarea>
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
                        <option @if (old('planned_month', $data->planned_month) == 'January') selected @endif>January</option>
                        <option @if (old('planned_month', $data->planned_month) == 'February') selected @endif>February</option>
                        <option @if (old('planned_month', $data->planned_month) == 'March') selected @endif>March</option>
                        <option @if (old('planned_month', $data->planned_month) == 'April') selected @endif>April</option>
                        <option @if (old('planned_month', $data->planned_month) == 'May') selected @endif>May</option>
                        <option @if (old('planned_month', $data->planned_month) == 'June') selected @endif>June</option>
                        <option @if (old('planned_month', $data->planned_month) == 'July') selected @endif>July</option>
                        <option @if (old('planned_month', $data->planned_month) == 'August') selected @endif>August</option>
                        <option @if (old('planned_month', $data->planned_month) == 'September') selected @endif>September</option>
                        <option @if (old('planned_month', $data->planned_month) == 'October') selected @endif>October</option>
                        <option @if (old('planned_month', $data->planned_month) == 'November') selected @endif>November</option>
                        <option @if (old('planned_month', $data->planned_month) == 'December') selected @endif>December</option>
                    </select>

                </div>
                <div class="col-sm-3">
                    <select class="custom-select" name="planned_week" id="planned_week">
                        <option @if (old('planned_week', $data->planned_week) == '1') selected @endif>1</option>
                        <option @if (old('planned_week', $data->planned_week) == '2') selected @endif>2</option>
                        <option @if (old('planned_week', $data->planned_week) == '3') selected @endif>3</option>
                        <option @if (old('planned_week', $data->planned_week) == '4') selected @endif>4</option>
                        <option @if (old('planned_week', $data->planned_week) == '5') selected @endif>5</option>
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
                        rows="3" value="">
                        {{ old('remarks', $data->remarks) }}</textarea>
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
