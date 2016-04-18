@extends('layouts.app')

@section('content')
<br>
<div class="container">
    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-default">
                <div class="panel-body">
                    <a href="{{ url('/admin/task/create') }}" class="btn btn-default">create new task</a>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">All Tasks</div>
                <div class="panel-body">
                    <table class="table table-condensed">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>title</th>
                                <th>description</th>
                                <th>category</th>
                                <th>default_points</th>
                                <th>answer</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tasks as $task)
                            <tr>
                                <td>{{$task->id}}</td>
                                <td>{{$task->title}}</td>
                                <td>{{$task->description}}</td>
                                <td>{{$task->category->name}}</td>
                                <td>{{$task->default_points}}</td>
                                <td>{{$task->answer}}</td>
                                <td><a href="{{ url('/admin/task/create . $task->id . '/edit') }}" class="btn btn-default">edit</a></td>
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
