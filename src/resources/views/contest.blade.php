@extends('layouts.app')

@section('content')

<br><br><br><br>
<div class="ui container">
	<h1>{{$contest->name}}</h1>
	<h4>{{$contest->description}}</h4>

	<br>

	<div class="ui grid">
		<div class="twelve wide column">

			@foreach($categories as $category)
				
				<h3>{{$category->name}}</h3>

				<table class="ui table">
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
									@if(Auth::user()->hasSolvedAndGraded($task))
										<span class="ui teal tag label">solved</span>
									@elseif(Auth::user()->hasSolved($task))
										<span class="ui tag label">solved</span>
									@endif
								</td>
								<td>{{count($task->getSolver($contest))}}</td>
								<td>{{$task->pivot->points}}</td>
								<td>
									<a href="/contest/{{$contest->id}}/task/{{$task->id}}" class="ui button">solve</a>
								</td>
							</tr>

						@empty


						@endforelse
					</tbody>
				</table>	

			@endforeach

		</div>
		<div class="four wide column">
			@include('partials.scoreboard', ['data' => $contest->getScoreBoardData()])
		</div>

	</div>
</div>

@endsection