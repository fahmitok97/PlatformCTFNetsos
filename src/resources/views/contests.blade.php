@extends('layouts.app')

@section('content')
<br><br><br><br>
	<div class="ui container">
		<h1 class="ui header">Contest</h1>
		<div class="ui grid">
			<div class="ten wide column">

				@foreach ($contests as $contest)
					<div class="ui raised segment">
			    		@if($contest->active)
						    <a class="ui teal left ribbon label">Active</a>
						@endif

						<span class="ui header">{{$contest->name}}</span>
						<p> {{$contest->description}} </p>
						<p> {{$contest->start_date}} - {{$contest->end_date}} </p>
						<p> participants: {{$contest->participations->count()}} </p>

						@if(Auth::check() && Auth::user()->isParticipate($contest))
							<a href="/contest/{{$contest->id}}" class="ui button green inverted">continue</a>
						@else
							<a href="/contest/{{$contest->id}}" class="ui button blue inverted">join</a>
						@endif
						<a href="{{ url('/contest/' . $contest->id . '/leaderboard' ) }}" class="ui button blue inverted">Leaderboard</a>
					</div>
				@endforeach

				<a href="" class="ui button">More contests</a>

			</div>
		</div>
	</div>
@endsection