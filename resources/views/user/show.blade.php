@extends('basePages.sac')

@section('content')
<div class="col-md-10 col-md-offset-1">
	<h1>
		Presentations
	</h1>

	<div class="table-responsive">
		<table class="table">
			<tr class="row">
				<th class="col-lg-10 col-md-10 col-sm-10 text-center"></th>
				<th class="col-lg-1 col-md-1  col-sm-1 text-center">Submitted</th>
				<th class="col-lg-1 col-md-1  col-sm-1 text-center">Approved</th>
			</tr>
			
			@foreach($presentations as $p)
			<tr class="row">
				<td>
					<h3>
						<a href="{{ route('presentation.show', $p['id'])}}">
							{{$p['title']}}
						</a>
					</h3>

					<p>
						{{$p['abstract']}}
					</p>
				</td>
				<td class="text-center">
					@if($p['submitted'])
						<i class="fa fa-check-circle-o"></i>
					@else
						<i class="fa fa-circle-o"></i>
					@endif
				</td>
				<td class="text-center">
					@if($p['approved'])
						<i class="fa fa-check-circle-o"></i>
					@else
						<i class="fa fa-circle-o"></i>
					@endif
				</td>
			</tr>
			@endforeach
		</table>
	</div>
</div>
@stop
