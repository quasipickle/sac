@extends('basePages.sac')

@section('content')
<div class="col-md-10 col-md-offset-1">
	<h3>
		Courses
	</h3>

	<div class="row">
		<form action="{{ route('add_course') }}" method="POST">
			{!! csrf_field() !!}
			<div class="col-md-11">
				<select type="text" class="form-control" name="course_id" id="course">
					<option value=""> Select a course </option>
					<option value="" disabled >---------</option>

					@foreach($courses as $course)
						<option value="{{ $course->id }}">
						{{ $course->subject_code." ". $course->number." - ".$course->title }}</option>
					@endforeach
				</select>
			</div>
			
			<div>
				<button type="submit" class="btn btn-default" id="add_course">
					<i class="fa fa-plus"></i>
				</button>
			</div>
			</form>
		</div>

	<div class="row">
		<div class="table-responsive">
			<table class="table">
				<tr class="row">
					<th class="col-lg-1 col-md-1 col-sm-1 text-center">Subject</th>
					<th class="col-lg-1 col-md-1 col-sm-1 text-center">Number</th>
					<th class="col-lg-9 col-md-9 col-sm-9 text-center">Title</th>
					<th class="col-lg-1 col-md-1 col-sm-1 text-center"></th>
				</tr>
				
				
				@foreach(Auth::user()->courses as $course)
				<tr class="row">
					<td class="text-center">
						<p>
							{{ $course->subject_code }}
						</p>
					</td>
					<td class="text-center">
						<p>
							{{ $course->number }}
						</p>
					</td>
					<td >
						<p>
							{{$course->title}}
						</p>
					</td>
					<td class="text-center">
						<i class="fa fa-trash"></i>
					</td>
				</tr>
				@endforeach
			</table>
		</div>
	</div>
</div>
@stop