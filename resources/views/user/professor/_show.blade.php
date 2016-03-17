@extends('basePages.sac')

@section('content')
<div class="col-md-10 col-md-offset-1">
	<h3>
		Courses
	</h3>

	<div class="row">
		@include('user.professor._add_course')
	</div>
	<br>
	<div class="row">
	@include('user.professor._show_courses')
	</div>
</div>
@stop
