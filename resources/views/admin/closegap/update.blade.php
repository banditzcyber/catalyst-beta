<div class="modal-body pd-sm-t-10 pd-sm-b-10 pd-sm-x-20">
    <input type="text" name="item_id" id="item_id" value="{{ $data->item_id }}">
    <input type="text" name="employee_id" id="employee_id" value="{{ $data->employee_id }}">
    <select name="status" id="status" class="form-control">
        <option value=""></option>
        <option value="1">Submitted</option>
        <option value="2">Reviewed</option>
        <option value="3">Approved</option>
        <option value="4">Rejected</option>
    </select>
</div><!-- modal-body -->

<div class="modal-footer pd-x-20 pd-y-15">
    <button type="button" class="btn btn-xs btn-white" data-dismiss="modal">Cancel</button>
    <button class="btn btn-xs btn-primary btnSave" onclick="update({{ $data->id }})">Save</button>
</div>
