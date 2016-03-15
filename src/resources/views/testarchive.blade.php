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

		<h1>{{$category->name}}</h1>
		<h4>{{$category->description}}</h4>

		<br>

		<div class="row">
			<div class="col-md-8">

				@forelse ($category->tasks as $task)
					<div class="card">
						<div class="card-header">{{$task->category->name}}</div>
						<div class="card-block">
							<h3>{{$task->title}}</h3>
							<p>{{$task->description}}</p>
							<form>
								<fieldset class="form-group">
									<input class="form-control" placeholder="insert flag here">
								</fieldset>
							</form>
						</div>
					</div>

				@empty
					<p>Empty category task</p>

				@endforelse

			</div>
		</div>

	</div>

</body>
</html>