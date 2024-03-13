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
            <a href="/competency" class="btn btn-sm pd-x-15 btn-danger btn-uppercase mg-l-5">
                <i data-feather="corner-down-left" class="wd-10 mg-r-5"></i>
                back
            </a>
        </div>
    </div>

    <div class="col-md-8">
        <form action="/competency/updateData" method="post">
            @csrf

            <input type="hidden" name="id_competency" id="id_competency" value="{{ $data->id }}">
            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Competency ID</label>
                <div class="col-sm-8">
                    <input type="text" name="competency_id" id="competency_id"
                        class="form-control tx-uppercase @error('competency_id') is-invalid @enderror" autofocus
                        value="{{ old('competency_id', $data->competency_id) }}" placeholder="XX-XXXX-XXX" />
                </div>
                @error('competency_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Area</label>
                <div class="col-sm-8">
                    <select class="custom-select" name="competency_area" id="competency_area">
                        <option value="{{ $data->competency_area }}" @selected(old('role_id') == $data->competency_area)>
                            @if ($data->competency_area == 'MFG')
                                Manufacturing - MFG
                            @elseif($data->competency_area == 'NMFG')
                                Non Manufacturing - NMFG
                            @else
                                All
                            @endif
                        </option>
                        <option value="MFG">Manufacturing - MFG</option>
                        <option value="NMFG">Non Manufacturing - NMFG</option>
                        <option value="ALL">All</option>
                    </select>
                </div>
                @error('competency_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Type</label>
                <div class="col-sm-8">
                    <select class="custom-select" name="competency_type" id="competency_type">
                        <option value="{{ $data->competency_type }}" @selected(old('role_id') == $data->competency_type)>
                            {{ $data->competency_type }}
                        </option>

                        <option value="Functional">Functional</option>
                        <option value="Core and Leardership">Core and Leadership</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
                @error('competency_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Competency Name</label>
                <div class="col-sm-8">
                    <input type="text" name="competency_name" id="competency_name"
                        class="form-control @error('competency_name') is-invalid @enderror" autofocus
                        value="{{ old('competency_name', $data->competency_name) }}" placeholder="competency name" />
                </div>
                @error('competency_name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Competency Name (bahasa)</label>
                <div class="col-sm-8">
                    <input type="text" name="competency_bahasa" id="competency_bahasa"
                        class="form-control @error('competency_bahasa') is-invalid @enderror" autofocus
                        value="{{ old('competency_bahasa', $data->competency_bahasa) }}"
                        placeholder="competency name (bahasa)" />
                </div>
                @error('competency_bahasa')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Description</label>
                <div class="col-sm-8">
                    <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description"
                        cols="30" rows="3" name="desc" value="{{ old('description') }}">{{ $data->description }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                @error('competency_bahasa')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Description (bahasa)</label>
                <div class="col-sm-8">
                    <textarea name="description_bahasa" class="form-control @error('description_bahasa') is-invalid @enderror"
                        id="description_bahasa" cols="30" rows="3" name="desc" value="{{ old('description_bahasa') }}">{{ $data->description_bahasa }}</textarea>
                    @error('description_bahasa')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                @error('competency_bahasa')
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
            var cleaveI = new Cleave('#competency_id', {
                delimiters: ['-', '-'],
                blocks: [2, 4, 3]
            });

            $(document).ready(function() {
                $("#data_detail").DataTable();
            });

            $(document).on("click", ".get", function(e) {
                $("#competency_id").val($(this).attr("competencyId"));
                $("#competency_name").val($(this).attr("competencyName"));
                $("#modalCompetency").modal("hide");
            });
        </script>
    @endpush
@endsection
