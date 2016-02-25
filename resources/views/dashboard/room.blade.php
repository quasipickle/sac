@extends('dashboard.adminbase')

@section('text')
<button type="submit" class="btn btn-primary">
  <a href="{!! route(add_room) !!}"
  <i class="fa fa-plus-square"></i> Add new Room </a>
</button>
@stop
