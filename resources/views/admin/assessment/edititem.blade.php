<div class="modal-body pd-sm-t-10 pd-sm-b-10 pd-sm-x-20">

    <select class="custom-select mg-b-5" name="assessment_result" id="assessment_result">
        <option value="1" @if (old('status', $data->assessment_result) == '1') selected @endif>Competent (C)</option>
        <option value="2" @if (old('status', $data->assessment_result) == '2') selected @endif>Need Improvement (NI)
        </option>
        <option value="3" @if (old('status', $data->assessment_result) == '3') selected @endif>Not Aplicable (NA)</option>
    </select>

    <select class="custom-select mg-b-5" name="actual_result" id="actual_result">
        <option value="1" @if (old('status', $data->actual_result) == '1') selected @endif>Competent (C)</option>
        <option value="2" @if (old('status', $data->actual_result) == '2') selected @endif>Need Improvement (NI)
        </option>
        <option value="3" @if (old('status', $data->actual_result) == '3') selected @endif>Not Aplicable (NA)</option>
    </select>
</div><!-- modal-body -->

<div class="modal-footer pd-0 pd-y-5 pd-x-10">
    <button type="button" class="btn btn-xs btn-white" data-dismiss="modal">Cancel</button>
    <button class="btn btn-xs btn-primary btnSave" onclick="update({{ $data->id }})">Save</button>
</div>
