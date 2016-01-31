@extends('layouts.base')

@section("content")

	<h1> Create a New Account </h1>
				{!! Form::open()!!}
					<div class='row'>
						<fieldset class="col-md-8 col-md-offset-2 form-group">
							{!! Form::label('username', 'Username') !!}
							{!! Form::text('username', null, ['class' => 'form-control']) !!}
						</fieldset>
					</div>

					<div class='row'>
						<fieldset class="col-md-8 col-md-offset-2 form-group">
							{!! Form::label('name', 'Full Name') !!}
							{!! Form::text('name', null, ['class' => 'form-control']) !!}
						</fieldset>
					</div>

					<div class='row'>
						<fieldset class="col-md-8 col-md-offset-2 form-group">
							{!! Form::label('email', 'Email') !!}
							{!! Form::text('email', null, ['class' => 'form-control']) !!}
						</fieldset>
					</div>

					<div class='row'>
						<fieldset class="col-md-8 col-md-offset-2 form-group">
							{!! Form::label('passowrd', 'Password') !!}
							{!! Form::password('password', ['class' => 'form-control']) !!}
						</fieldset>
					</div>

					<div class='row'>
						<fieldset class="col-md-8 col-md-offset-2 form-group">
							{!! Form::label('passowrd_confirm', 'Confirm Password') !!}
							{!! Form::password('password_confirm', ['class' => 'form-control']) !!}
						</fieldset>
					</div>
				<br>
					<fieldset class="col-md-8 form-group pull-right">
						{!! Form::submit('Create New Account',['class' => 'btn btn-primary'])!!}
					</fieldset>

		{!! Form::close()!!}
	</div>
@stop
