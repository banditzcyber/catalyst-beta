<div class="modal-body pd-sm-t-10 pd-sm-b-10 pd-sm-x-20">

    <div class="row">
        <label for="">Assessment Result</label>
        <select class="custom-select mg-b-5" name="assessment_result" id="assessment_result">
            <option value="1" @if (old('status', $data->assessment_result) == '1') selected @endif>Competent (C)</option>
            <option value="2" @if (old('status', $data->assessment_result) == '2') selected @endif>Need Improvement (NI)
            </option>
            <option value="3" @if (old('status', $data->assessment_result) == '3') selected @endif>Not Aplicable (NA)</option>
        </select>

        <label for="" class="mt-3">Actual Result</label>
        <select class="custom-select mg-b-5" name="actual_result" id="actual_result">
            <option value="1" @if (old('status', $data->actual_result) == '1') selected @endif>Competent (C)</option>
            <option value="2" @if (old('status', $data->actual_result) == '2') selected @endif>Need Improvement (NI)
            </option>
            <option value="3" @if (old('status', $data->actual_result) == '3') selected @endif>Not Aplicable (NA)</option>
        </select>
    </div>
</div><!-- modal-body -->

<div class="modal-footer pd-0 pd-y-5 pd-x-10">
    <button type="button" class="btn btn-xs btn-white" data-dismiss="modal">Cancel</button>
    <button class="btn btn-xs btn-primary btnSave" data-id="{{ $data->id }}">Save</button>
</div>

<script>
    //get data-id and parsing it
    $(document).ready(function() {
        $('.btnSave').click(function() {
            var id = $(this).data('id');
            $(document).trigger('updateButtonClicked', { id: id });
        });
    });
</script>
