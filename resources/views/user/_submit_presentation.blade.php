 <form action="{{ route('submit_presentation', $id) }}" method="POST">
	{!! csrf_field() !!}
	{!! method_field('PATCH') !!}

	<button type="submit" class="btn btn-link" 
			aria-label="Submit Presentation" title="Submit Presentation">
		<i class="fa fa-paper-plane"></i>
	</button>
</form>