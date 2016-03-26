@extends('layouts.app')

@section('content')

<div class="container">

	<h1>
	<a href="/contest/{{$contest->id}}"><i class="fa fa-arrow-left"></i>  {{$contest->name}}</a>
	</h1>
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

		<div class="col-md-4">
			<div class="panel panel-default">
				<div class="panel-heading">Solved by</div>
				<div class="panel-body">
					<table class="table">
						<thead>
							<th>#</th>
							<th>time</th>
							<th>username</th>
						</thead>
						<tbody>
							<?php $index = 0 ?>
							@foreach ($task->getCorrectSubmissions($contest) as $submission)
								<?php $index++ ?>
								<tr>
									<td>{{$index}}</td>
									<td>{{$submission->added_time}}</td>
									<td>
										{{$submission->getUser()->username}}
										@if ($index <= 3)
											<span class="label label-success">{{$index}}</span>
										@endif
									</td>
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