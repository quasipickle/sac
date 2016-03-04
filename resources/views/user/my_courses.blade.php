@extends('basePages.sac')

@section('content')
	<div class="col-md-10 col-md-offset-1">
	<h1>
		Presentations
	</h1>
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
@stop

@section('scripts')
	<script type="text/javascript">
	</script>
@stop