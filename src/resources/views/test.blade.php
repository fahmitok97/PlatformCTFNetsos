<!DOCTYPE html>
<html>
<head>
	<title>Test</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

	<link rel="stylesheet" href="/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>

	<nav class="navbar navbar-fixed-top navbar-dark bg-inverse">navbar</nav>
	<br><br><br><br>

	<div class="container">

		<div class="row">
			<div class="col-md-8">
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

				<br>
				<a class="btn btn-secondary">more contests</a>

			</div>
		</div>
		
	</div>

	<br><br>

	<div class="block-row">
		<div class="container">
			<h2>Categories</h2>
			<br>
			<div class="row">
				@foreach ($categories as $category)
					<div class="col-md-4">		
						<div class="card card-block center card-fixed-height">
							<h3 class="card-title">{{$category->name}}</h3>
							<p>{{$category->description}}</p>
							<a class="btn btn-primary" href="category/{{$category->id}}">Solve</a>
						</div>
					</div>
				@endforeach
			</div>
		</div>
	</div>

	<br><br>

</body>
</html>