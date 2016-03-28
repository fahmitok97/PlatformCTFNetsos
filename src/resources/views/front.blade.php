@extends('layouts.app')

@section('content')

<style>
    .hidden.menu {
		display: none;
    }
</style>

  <div class="ui inverted vertical masthead segment">

    <div class="ui container">
      <div class="ui large secondary inverted pointing menu">
        <a class="toc item">
          <i class="sidebar icon"></i>
        </a>

        <a class="active item" href="{{ url('/') }}">Home</a>
        <a class="item" href="{{ url('/contest') }}">Contest</a>
        <a class="item" href="{{ url('/') }}">Archive</a>
        <a class="item" href="{{ url('/') }}">Leaderboard</a>
        <a class="item" href="{{ url('/') }}">About</a>
        @if (Auth::check() && Auth::user()->isAdmin())
            <a class="item" href="{{ url('/admin') }}">Admin</a>
        @endif

        <div class="right item">
            <!-- Authentication Links -->
            @if (Auth::guest())
                <a href="{{ url('/login') }}" class="ui inverted button">Log in</a>
                <a href="{{ url('/register') }}" class="ui inverted button">Sign Up</a>
            @else
                <div class="ui simple dropdown item">
                    {{ Auth::user()->username }} <i class="dropdown icon"></i>
                    <div class="menu">
                            <a href="{{ url('/user/' . Auth::user()->id) }}" class="item">Profile</a>
                            <a href="{{ url('/logout') }}" class="item">Log out</a>
                    </div>
                </div>
            @endif
        </div>
      </div>
    </div>

	<br><br>
    <div class="ui center aligned text container">
      <h2 class="ui inverted header">
        Capture the Flag
      </h2>
      <h4>Learn to pwn interactively, for free.</h4>
    </div>

	<br><br><br><br>
 	<div class="ui container">
	    <div class="ui equal width grid">
	    	<div class="column">
	    		<h1 class="ui header inverted">{{$contests[0] -> name}}</h1>
	    		<p>{{$contests[0] -> description}}</p>
				@if(Auth::check() && Auth::user()->isParticipate($contests[0]))
					<a href="/contest/{{$contests[0]->id}}" class="ui huge inverted green button">continue</a>
				@else
					<a href="/contest/{{$contests[0]->id}}" class="ui huge inverted  button">join</a>
				@endif
	    	</div>
	    	<div class="four wide column">
	    		@if (Auth::guest())
	    		<h2 class="ui header inverted">Log in</h2>
				<form action="{{ url('/login') }} "method="POST" class="ui form">
                    {!! csrf_field() !!}
					<div class="field{{ $errors->has('email') ? ' has-error' : '' }}">
						<div class="ui left icon input">
                            <input placeholder="email" type="email" class="form-control" name="email" value="{{ old('email') }}">
							<i class="user icon"></i>

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
						</div>
					</div>
                    <div class="field{{ $errors->has('password') ? ' has-error' : '' }}">
                        <div class="ui left icon input">
                            <input placeholder="password" type="password" class="form-control" name="password">
							<i class="lock icon"></i>

                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="field">
                        <div class="ui checkbox">
                            <input type="checkbox" name="remember"> 
                            <label class="inverted">Remember Me</label>
                        </div>
                    </div>
					<button class="ui blue submit button" type="submit">Login</button>
				</form>
	            @else
	            <div class="text container">
	            	<h2 class="ui header inverted">Hello, {{Auth::user()->fullname}}</h2>
	            </div>
				@endif
			</div>
	    </div>
 	</div>
  </div>

<div class="ui vertical stripe segment">
	<div class="ui middle aligned stackable very relaxed grid container">
		<div class="row">
			<div class="eight wide column">
				<h2 class="ui header">Latest Contests</h2>

				@foreach ($contests as $contest)
					<h3 class="ui header">{{$contest->name}}</h3>
					<p>{{$contest->description}}</p>
					@if(Auth::check() && Auth::user()->isParticipate($contests[0]))
						<a href="/contest/{{$contest->id}}" class="ui large inverted green button">continue</a>
					@else
						<a href="/contest/{{$contest->id}}" class="ui large inverted blue button">join</a>
					@endif
				@endforeach
				
				<br><br>
				<a href="/contest" class="ui large button">More news</a>
			</div>
			<div class="ui vertical divider">
				Or
			</div>
			<div class="four wide column">
				<h3>Last week's Leaderboard</h3>
				@include('partials.scoreboard', ['data' => $contests[0]->getFinalScoreBoardData()])
				<a href="" class="ui large button">full leaderboard</a>
			</div>
			<div class="four wide column">
				<h3>All time Top Ten</h3>

				<table class="ui table">
					<thead>
						<tr>
							<th>#</th>
							<th>username</th>
							<th>score</th>
						</tr>
					</thead>
					<tbody>
						@foreach($users as $user)
						<tr>
							<td>{{0}}</td>
							<td>{{$user->username}}</td>
							<td>{{$user->getTotalScore()}}</td>
						</tr>
						@endforeach
					</tbody>
				</table>

				<a href="" class="ui large button">full leaderboard</a>
			</div>
		</div>
	</div>
</div>
<div class="ui vertical stripe segment">
		<h2 class="ui header center aligned">Categories</h2>
		<div class="ui middle aligned stackable grid container">

		@foreach ($categories as $category)
		<div class="four wide column">
			<div class="ui grey segment center aligned">
				<h3 class="ui header">{{$category->name}}</h3>
				<p>{{$category->description}}</p>
			</div>
		</div>
		@endforeach
	</div>
</div>

@endsection

@section('tail')
<script>
	$(document).ready(function() {
		// fix menu when passed
		$('.masthead').visibility({
			once: false,
			onBottomPassed: function() {
				$('.fixed.menu').transition('fade in');
			},
			onBottomPassedReverse: function() {
				$('.fixed.menu').transition('fade out');
			}
		});
	});
</script>
@endsection