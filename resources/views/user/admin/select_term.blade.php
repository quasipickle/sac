@extends('user.admin.basepage')

@section('admin_content')
<form action="{{ route('set_term')}}" method="POST" role='form'>
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <!-- <div class="form-group{{ $errors->has('course_id') ? ' has-error' : '' }}"> -->
  	<label class="control-label">select Term</label>

    <div>
  		<select type="text" class="form-control" name="term">
  			<option value=""> Select the current term </option>
  			<option value="" disabled >---------</option>

  			@foreach($terms as $term)
  				<option value="{{ $term->description }}">
  					{{$term->description}}</option>
  			@endforeach
  		</select>
    </div>
  <!-- </div> -->

  <div class="form-group">
  	<div class="col-md-6 col-md-offset-4">
  		<button type="submit" class="btn btn-primary">
  			<i class="fa fa-floppy-o"></i> Save
  		</button>
  	</div>
  </div>
</form>
@stop
