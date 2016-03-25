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
				<a href="/contest/{{$contests[0]->id}}" class="btn btn-default">Join</a>
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
			news

			@foreach ($contests as $contest)
				<div class="panel panel-default">
					<div class="panel-heading">{{$contest->name}}</div>
					<div class="panel-body">
						<p> {{$contest->description}} </p>
						<a href="/contest/{{$contest->id}}" class="btn btn-default">join</a>
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

@endsection