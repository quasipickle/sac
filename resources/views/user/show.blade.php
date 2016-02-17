@extends('basePages.sac')

@section('content')
<div class="col-md-8 col-md-offset-2">
	<h1>
		My Presentations
	</h1>

	@foreach($presentations as $p)
		<p> {{$p['title']}}</p>
	@endforeach
</div>
@stop
