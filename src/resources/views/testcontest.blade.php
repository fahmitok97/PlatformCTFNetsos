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

		<h1>{{$contest->title}}</h1>
		<h4>{{$contest->description}}</h4>

		<br>

		<div class="row">
			<div class="col-md-8">

				@forelse ($contest->contestTasks as $ctask)
					<div class="card">
						<div class="card-header">{{$ctask->task->category->name}}</div>
						<div class="card-block">
							<h3>{{$ctask->task->title}}</h3>
							<p>{{$ctask->task->description}}</p>
							<form>
								<fieldset class="form-group">
									<input class="form-control" placeholder="insert flag here">
								</fieldset>
							</form>
						</div>
					</div>

				@empty
					<p>Empty contestTasks</p>

				@endforelse

			</div>
		</div>

	</div>

</body>
</html>