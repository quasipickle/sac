{!! csrf_field() !!}
<div class="form-group">
  <label class="col-md-4 control-label">Room Id</label>

  <div class="col-md-6">
      <input type="text" class="form-control" name="code">
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label">Room building</label>

  <div class="col-md-6">
      <input type="text" class="form-control" name="description">
  </div>
</div>

<div class="form-group">
  <div class="col-md-6 col-md-offset-4">
      <button type="submit" class="btn btn-primary">
          <i class="fa fa-plus-square"></i>Add Room
      </button>
  </div>
</div>