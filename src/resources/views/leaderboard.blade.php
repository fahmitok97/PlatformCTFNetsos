@extends('layouts.app')

@section('content')

<br><br><br><br>
<div class="ui container">
	<h1>Leaderboard</h1>
	<h2>{{$contest->name}}</h2>
	<h4>{{$contest->description}}</h4>

	<br>

	<div class="ui grid">
		<div class="sixteen wide column">
			@include('partials.scoreboard', ['data' => $contest->getScoreBoardData()])
		</div>

	</div>
</div>

@endsection