<!DOCTYPE html>
<html>
<head>
	<title>Test</title>
	<link rel="stylesheet" href="/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="/css/styles.css">
</head>
<body>

	<nav class="navbar navbar-fixed-top navbar-dark bg-inverse">navbar</nav>
	<br><br><br><br>

	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<h3>Login</h3>
				<form>
					<fieldset class="form-group">
						<label for="username">Username</label>
						<input name="username" type="text" class="form-control" placeholder="username">
					</fieldset>
					<fieldset class="form-group">
						<label for="password">Password</label>
						<input name="password" type="password" class="form-control" placeholder="password">
					</fieldset>
					<input class="btn btn-primary form-control" value="login"></input>
				</form>
			</div>
			<div class="col-md-6">
				<h3>Register</h3>
				<form>
					<fieldset class="form-group">
						<label for="username">Username</label>
						<input name="username" type="text" class="form-control" placeholder="username">
					</fieldset>
					<fieldset class="form-group">
						<label for="username">Email</label>
						<input name="email" type="email" class="form-control" placeholder="email">
					</fieldset>
					<fieldset class="form-group">
						<label for="username">Fullname</label>
						<input name="fullname" type="text" class="form-control" placeholder="full name">
					</fieldset>
					<fieldset class="form-group">
						<label for="password">Password</label>
						<input name="password" type="password" class="form-control" placeholder="password">
					</fieldset>
					<fieldset class="form-group">
						<label for="password">Confirm Password</label>
						<input name="confirm_password" type="password" class="form-control" placeholder="confirm password">
					</fieldset>
					<input class="btn btn-primary form-control" value="register"></input>
				</form>
			</div>
		</div>
	</div>

</body>
</html>