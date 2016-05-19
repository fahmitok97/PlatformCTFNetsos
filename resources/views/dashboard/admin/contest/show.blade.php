@extends('layouts.app')

@section('content')
<br>
<div class="container">
    <div class="row">

        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Contest Information</div>
                <div class="panel-body">
                    <form method="POST" action="{{ url('/admin/contest/' . $contest->id) }}">
                        {!! csrf_field() !!}
                        {!! method_field('PUT') !!}
                        <div class="form-group">
                            <label for="" class="control-label">Contest Name</label>
                            <input type="text" class="form-control" name="name" value="{{$contest->name}}">
                        </div>
                        <div class="form-group">
                            <label for="" class="control-label">Category Description</label>
                            <textarea type="text" class="form-control" name="description" rows="10">{{$contest->description}}</textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-btn fa-sign-in"></i>Update
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Contest Statistic</div>
                <div class="panel-body">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>Participants</td>
                                <td>{{$contest->participations->count()}}</td>
                            </tr>
                            <tr>
                                <td>Total Submission</td>
                                <td>??</td>
                            </tr>
                            <tr>
                                <td>Tasks</td>
                                <td>{{$contest->tasks()->count()}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Tasks</div>
                <div class="panel-body">
                    <div class="col-md-6">

                        <form action="{{ url('/admin/contest/' . $contest->id . '/task') }}" method="POST" class="form-horizontal">
                            {!! csrf_field() !!}
                            {!! method_field('PUT') !!}
                            <div class="form-group">
                                <div class="col-md-6">
                                    <input type="number" class="form-control" name="task-id" placeholder="new task id">
                                </div>
                                <div class="col-md-4">
                                    <input type="number" class="form-control" name="task-points" placeholder="points">
                                </div>
                                <div class="col-md-2">
                                    <input class="btn btn-default" type="submit">
                                </div>
                            </div>
                        </form>

                    </div>
                    <div class="col-md-12">
                        <h3>Added</h3>
                        <table class="table table-condensed">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>category</th>
                                    <th>title</th>
                                    <th>description</th>
                                    <th>points</th>
                                    <th>action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($contest->tasks as $task)
                                <tr>
                                    <td>{{$task->id}}</td>
                                    <td>{{$task->category->name}}</td>
                                    <td>{{$task->title}}</td>
                                    <td>{{$task->description}}</td>
                                    <td>{{$task->pivot->points}}</td>
                                    <td>

                                    <form action="{{ url('/admin/contest/' . $contest->id . '/task/' . $task->id) }}" method="POST">
                                        {!! csrf_field() !!}
                                        {!! method_field('DELETE') !!}
                                        <button class="btn btn-default" type="submit">remove</button>
                                    </form>
                                    <a href="{{ url('/admin/task/create . $task->id . '/edit') }}" class="btn btn-default">edit</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>                

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
