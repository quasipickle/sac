{!! csrf_field() !!}
<div class="form-group">
  <label class="col-md-4 control-label">Code</label>

  <div class="col-md-6">
      <input type="text" class="form-control" 
        value="{{ old('code', $room['code']) }}"
        name="code" maxlength="5" {{ $room['code'] ? 'disabled' : '' }} >
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label">Description</label>

  <div class="col-md-6">
      <input type="text" class="form-control"
        value="{{ old('description', $room['description']) }}"
        name="description" maxlength="20">
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label">Building</label>

  <div class="col-md-6">
      <input type="text" class="form-control"
        value="{{ old('building', $room['building']) }}"
        name="building" maxlength="20">
  </div>
</div>

<div class="form-group">
  <div class="col-md-6 col-md-offset-4">
      <button type="submit" class="btn btn-primary">
          <i class="fa fa-floppy-o"></i> Save
      </button>
  </div>
</div>