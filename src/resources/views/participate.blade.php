@extends('layouts.app')

@section('content')

<div class="container">

	<h1>{{$contest->name}}</h1>
	<h4>{{$contest->description}}</h4>

	<br>

	<div class="row">
		<div class="col-md-4 col-md-offset-4">

			<div class="panel panel-default">
				<div class="panel-heading">confirm participation</div>
				<div class="panel-body">
					<p>Participate?</p>
	
					<form action="/participate/{{$contest->id}}" method="POST">
                        {!! csrf_field() !!}
						<button type="submit" class="form-control btn btn-default">Participate</button>
					</form>
					<br>
					<a href="{{ url('/contest') }}" class="form-control btn btn-default">Return</a>
					</div>

				</div>
			</div>

		</div>
	</div>

</div>

@endsection