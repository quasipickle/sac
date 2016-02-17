@extends('basePages.sac')

@section('title')
	Add Presentation
@stop

@section('content')
<div classs="fluid-container">
	<div class="row text-center">
		<h2>
			Edit Presentation
		</h2>
	</div>
NOT DISPLAYING DATABASE INFO!
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<form class="form-horizontal" role="form" method="POST" 
			action="{{ route('presentation.updatea') }}">
				@include('presentations._form', ['button_text' => 'Save'])
			</form>
		</div>
	</div>
</div>
@stop