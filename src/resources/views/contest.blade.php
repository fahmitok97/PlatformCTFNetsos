@extends('layout')

@section('content')

<div class="container">
	<h1>{{$contest->title}}</h1>
	<h4>{{$contest->description}}</h4>

	<br>

	<div class="row">
		<div class="col-md-8">

			@forelse ($contest->tasks as $task)
				<div class="panel panel-default">
					<div class="panel-heading">{{$task->category->name}}</div>
					<div class="panel-body">
						<h3>{{$task->title}}</h3>
						<p>{{$task->description}}</p>
						<form>
							<fieldset class="form-group">
								<input class="form-control" placeholder="insert flag here">
							</fieldset>
						</form>
					</div>
				</div>

			@empty
				<p>Empty contestTasks</p>

			@endforelse

		</div>
	</div>
</div>

@endsection