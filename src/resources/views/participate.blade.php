@extends('layouts.app')

@section('content')

<div class="container">

	<h1>{{$contest->name}}</h1>
	<h4>{{$contest->description}}</h4>

	<br>

	<div class="row">
		<div class="col-md-8">

			<div class="panel panel-default">
				<div class="panel-body">
					Participate?
					<form action="/participate/{{$contest->id}}" method="POST">
                        {!! csrf_field() !!}
						<button type="submit" class="btn btn-default">Participate</button>
					</form>
					<a href="/contests" class="btn btn-default">Return</a>
				</div>
			</div>

		</div>
	</div>

</div>

@endsection