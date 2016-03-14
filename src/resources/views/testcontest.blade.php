<!DOCTYPE html>
<html>
<head>
	<title>Test</title>
	<link rel="stylesheet" href="https://cdn.rawgit.com/twbs/bootstrap/v4-dev/dist/css/bootstrap.css">
</head>
<body>

	<div class="container">

		<h1>{{$contest->title}}</h1>
		<h4>{{$contest->description}}</h4>

		@foreach ($contest->contestTasks as $ctask)
			<div class="card">
				<div class="card-header">task</div>
				<div class="card-block">
					<h3>{{$ctask->task->title}}</h3>
					<p>{{$ctask->task->description}}</p>
				</div>
			</div>

		@endforeach


	</div>

</body>
</html>