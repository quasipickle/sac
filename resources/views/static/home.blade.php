@extends('basePages.sac')

@section('content')
	@if(Auth::check())
		@include('user.home')
	@else
		<div class="jumbotron">
			<h1>SAC Home Page</h1>
		</div>
	@endif
@endsection
