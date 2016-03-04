@extends('basePages.sac')

@section('content')
	@foreach(Auth::user()->courses as $course)
		<ul>
			<li>{{ $course->subject_code.$course->number." - ".$course->title}}</li>
		</ul>
	@endforeach
@stop