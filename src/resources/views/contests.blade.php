@extends('layouts.app')

@section('content')

<div class="container">
	<h1>Contest</h1>
	<h4>See contests</h4>

	<br>

	<div class="row">
		<div class="col-md-8">

			@foreach ($contests as $contest)
				<div class="panel panel-default">
					<div class="panel-heading">{{$contest->name}}</div>
					<div class="panel-body">
						<p> {{$contest->description}} </p>
						<a href="/contest/{{$contest->id}}" class="btn btn-default">join</a>
					</div>
				</div>
			@endforeach

			<a href="" class="btn btn-default">More contests</a>

		</div>
	</div>
</div>

@endsection