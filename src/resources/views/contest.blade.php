@extends('layouts.app')

@section('content')

<div class="container">
	<h1>{{$contest->name}}</h1>
	<h4>{{$contest->description}}</h4>

	<br>

	<div class="row">
		<div class="col-md-8">

			@foreach($categories as $category)
				
				<h3>{{$category->name}}</h3>

				<table class="table">
					<thead>
						<tr>
							<th>#</th>
							<th>task name</th>
							<th>total solve</th>
							<th>score</th>
							<th>action</th>
						</tr>
					</thead>
					<tbody>
						@forelse ($contest->tasks->where('category_id', $category->id) as $task)
							<tr>
								<td>{{$task->id}}</td>
								<td>
									<a href="{{'/contest/' . $contest->id . '/task/' . $task->id}}">
										{{$task->title}}
									</a>
									@if(Auth::user()->hasSolved($task))
										<span class="label label-success">solved</span>
									@else
										<span class="label label-default">not solved</span>
									@endif
								</td>
								<td>{{count($task->getCorrectSubmissions($contest))}}</td>
								<td>{{$task->pivot->points}}</td>
								<td>
									<a href="/contest/{{$contest->id}}/task/{{$task->id}}" class="btn btn-default">solve</a>
								</td>
							</tr>

						@empty


						@endforelse
					</tbody>
				</table>	

			@endforeach

		</div>
		<div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">scoreboard</div>
                <div class="panel-body">
                    <table class="table table-condensed">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>username</th>
                                <th>points</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $index => $user)
                            <tr>
                                <td>{{$index}}</td>
                                <td><a href="/user/{{$user->id}}">{{$user->username}}</a></td>
                                <td>{{$user->score($contest)}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>            
                </div>
            </div>
		</div>

	</div>
</div>

@endsection