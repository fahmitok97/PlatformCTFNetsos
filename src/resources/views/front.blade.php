@extends('layouts.app')

@section('content')

<div class="jumbotron front-jumbotron">
	<div class="container small-container">
		
		<div class="row">
			<h2 class="text-center">Learn to code interactively, for free.</h2>
		</div>
		
		<br><br><br>

		<div class="row">
			<div class="col-md-8">
				<h2>{{$contests[0] -> name}}</h2>
				<p>{{$contests[0] -> description}}</p>
				@if(Auth::check() && Auth::user()->isParticipate($contests[0]))
					<a href="/contest/{{$contests[0]->id}}" class="btn btn-success">continue</a>
				@else
					<a href="/contest/{{$contests[0]->id}}" class="btn btn-default">join</a>
				@endif
			</div>

            @if (Auth::guest())
			<div class="col-md-4">
				<h3>Login</h3>
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <div class="col-md-12">
                                <input placeholder="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <div class="col-md-12">
                                <input placeholder="password" type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-sign-in"></i>Login
                                </button>

                                <a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
                            </div>
                        </div>
                    </form>
			</div>
            @else
            <div class="col-md-4">
            	<h2>Hello, {{Auth::user()->fullname}}</h2>
            </div>
            @endif
		</div>
	</div>
</div>

<div class="container">
	
	<div class="row">
		<div class="col-md-6">
			<h3>News</h3>

			@foreach ($contests as $contest)
				<div class="panel panel-default">
					<div class="panel-heading">{{$contest->name}}</div>
					<div class="panel-body">
						<p> {{$contest->description}} </p>
						@if(Auth::check() && Auth::user()->isParticipate($contest))
							<a href="/contest/{{$contest->id}}" class="btn btn-success">continue</a>
						@else
							<a href="/contest/{{$contest->id}}" class="btn btn-default">join</a>
						@endif
					</div>
				</div>
			@endforeach
			<a href="/contest" class="btn btn-default">More news</a>
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
							<th>points</th>
						</tr>
					</thead>
					<tbody>
						@foreach($contests[0]->participations as $i=>$participation)
						<tr>
							<td>{{$i}}</td>
							<td>{{$participation->user->username}}</td>
							<td>{{$participation->user->final_score}}</td>
						</tr>
						@endforeach
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
							@foreach($users as $i=>$user)
							<tr>
								<td>{{$i}}</td>
								<td>{{$user->username}}</td>
								<td>{{$user->getTotalScore()}}</td>
							</tr>
							@endforeach
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
							<a class="btn btn-default" href="#">Solve</a>
						</div>
					</div>
				</div>
			@endforeach
		</div>
	</div>
</div>

@endsection