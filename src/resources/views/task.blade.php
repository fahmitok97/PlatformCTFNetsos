@extends('layouts.app')

@section('content')

<div class="container">

	<h1>{{$contest->name}}</h1>
	<h4>{{$contest->description}}</h4>

	<br>

	<div class="row">
		<div class="col-md-8">

			@if(isset($status))
			    @if($status == 0)
					<div class="alert alert-danger" role="alert">
						<strong>Mismatch!</strong> You submit wrong flag
					</div>
			    @else
					<div class="alert alert-success" role="alert">
						<strong>Correct!</strong> You solve this challenge
					</div>
			    @endif
			@endif
			
			<div class="panel panel-default">
				<div class="panel-heading">{{$task->category->name}}</div>
				<div class="panel-body">
					<h3>{{$task->title}}</h3>
					<p>{{$task->description}}</p>
					<form action="/contest/{{$contest->id}}/task/{{$task->id}}" method="POST">
                        {!! csrf_field() !!}
                        {!! method_field('PUT') !!}
						<fieldset class="form-group">
							<input name="answer" class="form-control" placeholder="insert flag here">
						</fieldset>
						<button class="btn btn-default" type="submit">submit</button>
					</form>
				</div>
			</div>

		</div>
	</div>

</div>

@endsection