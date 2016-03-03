@extends('dashboard.adminbase')

@section('text')

<div class="container">
  <div class="row">
      <div class="col-md-8 col-md-offset-0">
        <form class="form-horizontal" role="form" method="POST" action="{{ route('store') }}">
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
        </form>
      </div>
   </div>
</div>
@stop
