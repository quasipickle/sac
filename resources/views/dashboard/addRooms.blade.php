@extends('dashboard.adminbase')

@section('text')
<div class="form-group">
	<label class="col-md-3 control-label">Room Id</label>
  <div class="col-md-6">
		<input type="text" class="form-control" name="room_id">
  </div>
</div>

<a class="btn btn-default" href="{{ route('create_room') }}">

  <i class="fa fa-plus-square"></i> Add Room

@stop
