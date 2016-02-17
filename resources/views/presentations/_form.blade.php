{!! csrf_field() !!}

<div class="form-group{{ $errors->has('professor') ? ' has-error' : '' }}">
	<label class="col-md-3 control-label">Professor Name</label>

	<div class="col-md-6">
		<input type="text" class="form-control" name="professor" value="{{ old('professor') }}">

		@if ($errors->has('professor'))
			<span class="help-block">
				<strong>{{ $errors->first('professor') }}</strong>
			</span>
		@endif
	</div>
</div>

<div class="form-group{{ $errors->has('student') ? ' has-error' : '' }}">
	<label class="col-md-3 control-label">Student Name</label>

	<div class="col-md-6">
		<input type="text" class="form-control" name="student" value="{{ old('student') }}">

		@if ($errors->has('student'))
			<span class="help-block">
				<strong>{{ $errors->first('student') }}</strong>
			</span>
		@endif
	</div>
</div>

<div class="form-group{{ $errors->has('course') ? ' has-error' : '' }}">
	<label class="col-md-3 control-label">Course</label>

	<div class="col-md-6">
		<select type="text" class="form-control" name="course" value="{{ old('course') }}">
			@foreach($courses as $course)
				<option value="{{ $course->code }}"> {{ $course->description }}</option>
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
		<input type="text" class="form-control" name="title" value="{{ old('title') }}">

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
		<select type="text" class="form-control" name="type" value="{{ old('type') }}">
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
		<textarea abstract="text" class="form-control" name="abstract" value="{{ old('abstract') }}"></textarea>

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
		<textarea special_notes="text" class="form-control" name="special_notes" value="{{ old('special_notes') }}"></textarea>

		@if ($errors->has('special_notes'))
			<span class="help-block">
				<strong>{{ $errors->first('special_notes') }}</strong>
			</span>
		@endif
	</div>
</div>

<div class="form-group">
	<div class="col-md-6 col-md-offset-4">
		<button type="submit" class="btn btn-primary">
			<i class="fa fa-btn fa-user"></i>{{$button_text}}
		</button>

		<a class="btn btn-default disabled" disabled href="">Submit</a>

		<a class="btn btn-default" href="{{ route('home') }}">Cancel</a>
	</div>
</div>