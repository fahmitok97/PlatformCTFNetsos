<!DOCTYPE html>
<html>
<head>
	<title>Test</title>
	<link rel="stylesheet" href="https://cdn.rawgit.com/twbs/bootstrap/v4-dev/dist/css/bootstrap.css">
</head>
<body>

	<div class="container">
		
		@foreach ($contests as $contest)

			<div class="card">
				<div class="card-header">Contest</div>
				<div class="card-block">
					<p>{{$contest->title}}</p>
					<p>{{$contest->description}}</p>
					<a href="contest/{{$contest->id}}" class="btn btn-primary">Join</a>
				</div>
			</div>

		@endforeach

	</div>

</body>
</html>