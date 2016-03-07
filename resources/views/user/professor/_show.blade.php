<div class="col-md-10 col-md-offset-1">
	@foreach(Auth::user()->courses as $course)
	<h4>
		<a  role="button" data-toggle="collapse"
			href="#{{$course->id}}" aria-expanded="false"
			aria-controls="collapseExample">
			{{ $course ->title }}
		</a>
	</h4>

	<div class="collapse" id="{{$course->id}}">
		@include('user._presentations_table', ['presentations' => $course->presentations])
	</div>
	
	@endforeach
</div>