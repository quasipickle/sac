{!! csrf_field() !!}

<div class="form-group{{ $errors->has('professor_name') ? ' has-error' : '' }}">
	<label class="col-md-3 control-label">Professor Name</label>

	<div class="col-md-6">
		<input type="text" class="form-control" name="professor_name"
			value="{{ $presentation['professor_name'] }}">

		@if ($errors->has('professor_name'))
			<span class="help-block">
				<strong>{{ $errors->first('professor_name') }}</strong>
			</span>
		@endif
	</div>
</div>

<div class="form-group{{ $errors->has('student_name') ? ' has-error' : '' }}">
	<label class="col-md-3 control-label">Student Name</label>

	<div class="col-md-6">
		<input type="text" class="form-control" name="student_name"
			value="{{ $presentation['student_name'] }}">

		@if ($errors->has('student_name'))
			<span class="help-block">
				<strong>{{ $errors->first('student_name') }}</strong>
			</span>
		@endif
	</div>
</div>

<div class="form-group{{ $errors->has('course') ? ' has-error' : '' }}">
	<label class="col-md-3 control-label">Course</label>

	<div class="col-md-6">
		<select type="text" class="form-control" name="course"
			>
			<option value="">Select a course</option>

			@foreach($courses as $course)
				<option value="{{ $course->code }}">{{ $course->description }}</option>
			@endforeach
		</select>

		@if ($errors->has('course'))
			<span class="help-block">
				<strong>{{ $errors->first('course') }}</strong>
			</span>
		@endif
	</div>
</div>

<div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
	<label class="col-md-3 control-label">Title</label>

	<div class="col-md-6">
		<input type="text" class="form-control" name="title"
			value="{{ $presentation['title'] }}">

		@if ($errors->has('title'))
			<span class="help-block">
				<strong>{{ $errors->first('title') }}</strong>
			</span>
		@endif
	</div>
</div>

<div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
	<label class="col-md-3 control-label">Type</label>

	<div class="col-md-6">
		<select type="text" class="form-control" name="type"
			>
			<option value="">Select a presentation type</option>
			<option value="" disabled>---------</option>
			@foreach($presentation_types as $type)
				<option value="{{ $type->id }}"> {{ $type->description }}</option>
			@endforeach
		</select>

		@if ($errors->has('type'))
			<span class="help-block">
				<strong>{{ $errors->first('type') }}</strong>
			</span>
		@endif
	</div>
</div>

<div class="form-group{{ $errors->has('abstract') ? ' has-error' : '' }}">
	<label class="col-md-3 control-label">Abstract</label>

	<div class="col-md-6">
		<textarea abstract="text" class="form-control" 
			name="abstract">{{ $presentation['abstract'] }}</textarea>

		@if ($errors->has('abstract'))
			<span class="help-block">
				<strong>{{ $errors->first('abstract') }}</strong>
			</span>
		@endif
	</div>
</div>

<div class="form-group{{ $errors->has('special_notes') ? ' has-error' : '' }}">
	<label class="col-md-3 control-label">Special Notes</label>

	<div class="col-md-6">
		<textarea special_notes="text" class="form-control" 
			name="special_notes" >{{ $presentation['special_notes'] }}</textarea>

		@if ($errors->has('special_notes'))
			<span class="help-block">
				<strong>{{ $errors->first('special_notes') }}</strong>
			</span>
		@endif
	</div>
</div>

<div class="form-group">
	<div class="col-md-6 col-md-offset-6">
		<a class="btn btn-default" href="{{ route('home') }}">
			<i class="fa fa-arrow-left"></i>
			Cancel
		</a>

		<button type="submit" class="btn btn-primary">
			<i class="fa fa-floppy-o"></i> Save
		</button>
	</div>
</div>