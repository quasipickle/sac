@extends("app")


@section("content")

	<h1> Create a New Account </h1>
	<form class="" action="index.html" method="post">
		<div class="input-group">
			<label for="username">username:</label>
			<input type="text" name="username" class="form-control" id="username" placeholder="username" aria-describedby="basic-addon1">
		</div>

		<div class="input-group">
			<label for="Full Name">Full Name:</label>
			<input type="text" name="Full Name" class="form-control" id="Full Name" placeholder="Full Name" aria-describedby="basic-addon1">
		</div>

		<div class="input-group">
			<label for="e-mail">e-mail:</label>
			<input type="text" name="e-mail" class="form-control" id="e-mail" placeholder="e-mail" aria-describedby="basic-addon1">
		</div>

		<div class="input-group">
			<label for="password">password:</label>
			<input type="password" name="password" class="form-control" id="password" placeholder="password" aria-describedby="basic-addon1">
		</div>

		<div class="input-group">
			<label for="Confirm password">Confirm password:</label>
			<input type="password" name="password" class="form-control" id="Confirm password" placeholder="password" aria-describedby="basic-addon1">
		</div>

	</form>


@endsection
