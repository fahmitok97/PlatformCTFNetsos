@extends('layouts.app')

@section('content')

<br><br><br><br>
<div class="ui container">
	<div class="ui grid">
		<div class="ten wide column left aligned">
			<h1>{{$contest->name}}</h1>
			<h4>{{$contest->description}}</h4>
		</div>
		<div class="six wide column right aligned">
			<h5>Start: {{$contest->start_date}}</h5>
			<h5>End: {{$contest->end_date}}</h5>
		</div>
	</div>

	<br>

	<div class="ui grid">
		<div class="ten wide column">

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
									<a href="{{ url('contest/' . $contest->id . '/task/' . $task->id ) }}">
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
									<a href="{{ url('/contest/'. $contest->id . '/task/' . $task->id) }}" class="ui button">solve</a>
								</td>
							</tr>

						@empty


						@endforelse
					</tbody>
				</table>	

			@endforeach

		</div>
		<div class="six wide column">
			<h3 class="ui header">Leaderboard</h3>
			@include('partials.scoreboard', [
				'data' => $contest->getScoreBoardData(),
				'useLatestSubmit' => True
				])
		</div>

	</div>
</div>

@endsection