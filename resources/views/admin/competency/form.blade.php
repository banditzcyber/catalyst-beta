<div class="modal-body pd-sm-t-10 pd-sm-b-10 pd-sm-x-20">



    <div class="form-group row">
        <label class="col-sm-4 col-form-label">Competency ID</label>
        <div class="col-sm-8">
            <input type="text" name="competency_id" id="competency_id"
                class="form-control tx-uppercase @error('competency_id') is-invalid @enderror" autofocus
                value="{{ old('competency_id') }}" placeholder="M-00-0000-0000" />
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
                <option selected class="tx-italic">--please select-</option>
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
                <option selected class="tx-italic">--please select-</option>
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
                value="{{ old('competency_name') }}" placeholder="competency name" />
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
                value="{{ old('competency_bahasa') }}" placeholder="competency name (bahasa)" />
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
                cols="30" rows="3" name="desc" value="{{ old('description') }}"></textarea>
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
                id="description_bahasa" cols="30" rows="3" name="desc" value="{{ old('description_bahasa') }}"></textarea>
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

</div><!-- modal-body -->
<div class="modal-footer pd-x-20 pd-y-15">
    <button type="reset" class="btn btn-xs btn-white" data-dismiss="modal">Cancel</button>
    <button class="btn btn-xs btn-primary btnSave" onclick="store()">Save</button>
</div>

@push('scripts')
    <script>
        var cleaveI = new Cleave('#competency_id', {
            delimiters: ['-', '-', '-'],
            blocks: [2, 3, 1, 3]
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
