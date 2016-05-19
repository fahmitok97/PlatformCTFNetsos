@extends('layouts.app')

@section('content')
<br><br><br><br>

<div class="ui container">

	<div class="ui middle aligned center aligned grid">
		<div class="eight wide column">
			<h2 class="ui teal header">
				<div class="content">
					Confirm Participation
				</div>
			</h2>
			<div class="ui teal segment">
				<h1 class="header">{{$contest->name}}</h1>
				<p>{{$contest->description}}</p>
				<br>

				<form action="{{ url('/participate/' . $contest->id) }}" method="POST">
                    {!! csrf_field() !!}
					<button type="submit" class="ui button teal">Participate</button>
					<a href="{{ url('/contest') }}" class="ui button red">Cancel</a>
				</form>

			</div>
		</div>
	</div>
	
</div>

@endsection