@extends('layout')

@section('content')

<div class="jumbotron front-jumbotron">
	<div class="container small-container">
		
		<div class="row">
			<h2 class="text-center">Learn to code interactively, for free.</h2>
		</div>
		
		<br><br><br>

		<div class="row">
			<div class="col-md-8">
				<h2>Fortnight CTF #2</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo, ad aspernatur perferendis. Odit, atque consequatur animi non accusamus nam incidunt sunt ipsa maxime commodi obcaecati inventore blanditiis vitae modi ullam.</p>
				<a href="" class="btn btn-default">Join</a>
			</div>
			<div class="col-md-4">
				<h3>Login</h3>
				<form action="">
					<div class="form-group">
						<input type="text" name="username" placeholder="username" class="form-control">
					</div>
					<div class="form-group">
						<input type="password" name="password" placeholder="password" class="form-control">
					</div>
					<button type="submit" class="btn btn-default form-control">Submit</button>
				</form>
			</div>
		</div>
	</div>
</div>

<div class="container">
	
	<div class="row">
		<div class="col-md-6">
			news
			<div class="panel panel-default">
				<div class="panel-heading">FortnightCTF#1</div>
				<div class="panel-body">
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odio id molestias quos alias, ab, facilis reprehenderit veniam, animi assumenda esse magnam fugiat illo, laborum? Mollitia ex impedit, esse illo optio?</p>
					<a href="" class="btn btn-default">join</a>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading">FortnightCTF#0</div>
				<div class="panel-body">
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eum nulla, sit libero aspernatur alias temporibus corrupti veniam provident accusantium facilis architecto ipsum dignissimos non dolore voluptates possimus vero fuga illum!</p>
					<a href="" class="btn btn-default">join</a>
				</div>
			</div>
			<a href="" class="btn btn-default">More news</a>
		</div>
		<div class="col-md-3">
			<div class="panel panel-default">
				<div class="panel-heading">Last week's Leaderboard</div>

				<!-- Table -->
				<table class="table table-condensed">
					<thead>
						<tr>
							<th>#</th>
							<th>username</th>
							<th>score</th>
						</tr>
					</thead>
					<tbody>
						@for ($i = 0; $i < 10; $i++)
						<tr>
							<td>{{$i}}</td>
							<td>Adam</td>
							<td>100</td>
						</tr>
						@endfor
					</tbody>
				</table>				
			</div>
			<a href="" class="btn btn-default">full leaderboard</a>
		</div>
		<div class="col-md-3">
			<div class="panel panel-default">
				<div class="panel-heading">All time Leaderboard</div>

					<!-- Table -->
					<table class="table table-condensed">
						<thead>
							<tr>
								<th>#</th>
								<th>username</th>
								<th>score</th>
							</tr>
						</thead>
						<tbody>
							@for ($i = 0; $i < 10; $i++)
							<tr>
								<td>{{$i}}</td>
								<td>Adam</td>
								<td>100</td>
							</tr>
							@endfor
						</tbody>
					</table>
				</div>
			</div>
			<a href="" class="btn btn-default">full leaderboard</a>
		</div>
	</div>

</div>

<br>
<div class="jumbotron">
	<div class="container small-container">
		<h2>Categories</h2>
		<br>
		<div class="row">
			@foreach ($categories as $category)
				<div class="col-md-4">		
					<div class="panel panel-default panel-category">
						<div class="panel-body">
							<h3>{{$category->name}}</h3>
							<img src="variants-path.svg" alt="" width="150px"><br>
							<p>{{$category->description}}</p>
							<a class="btn btn-default" href="category/{{$category->id}}">Solve</a>
						</div>
					</div>
				</div>
			@endforeach
		</div>
	</div>
</div>

@endsection()