@extends('layouts.app')

@section('content')
<br><br><br><br>
<div class="ui container">
    <div class="ui grid">

        <div class="five wide column">

            <div class="ui segment">
                <div class="ui header">Edit Contest</div>
                <div>
                    <form class="ui form" method="POST" action="/admin/contest/{{$contest->id}}">
                        {!! csrf_field() !!}
                        {!! method_field('PUT') !!}
                        <div class="field">
                            <label for="" class="control-label">Contest Name</label>
                            <input type="text" class="form-control" name="name" value="{{$contest->name}}">
                        </div>
                        <div class="field">
                            <label for="" class="control-label">Category Description</label>
                            <textarea type="text" class="form-control" name="description" rows="10">{{$contest->description}}</textarea>
                        </div>
                        <div class="field">
                            <button type="submit" class="ui button blue">
                                <i class="fa fa-btn fa-sign-in"></i>Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>

        <div class="six wide column">
            <div class="ui segment">
                <div class="ui header">Contest Statistic</div>
                <div>
                    <table class="ui table">
                        <tbody>
                            <tr>
                                <td>Participants</td>
                                <td>{{$contest->participations->count()}}</td>
                            </tr>
                            <tr>
                                <td>Total Submission</td>
                                <td>{{$contest->submissions->count()}}</td>
                            <tr>
                                <td>Total correct submissions</td>
                                <td>{{count($contest->getCorrectSubmissions())}}</td>
                            </tr>                            </tr>
                            <tr>
                                <td>Tasks</td>
                                <td>{{$contest->tasks()->count()}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="five wide column">
            <div class="ui segment">
                <div class="ui header">Action</div>
                <a href="" class="ui button red">Deactivate Contest</a>
            </div>
        </div>


    </div>

    <div class="ui grid">
        <div class="eight column wide">
            <div class="ui segment">
                <div class="ui header">Tasks</div>
                <div>
                    <div class="eight column wide">

                        <form action="{{ '/admin/contest/' . $contest->id . '/task' }}" method="POST" class="ui form inline?">
                            {!! csrf_field() !!}
                            {!! method_field('PUT') !!}
                            <div class="field">
                                <div class="eight wide column">
                                    <input type="number" class="form-control" name="task-id" placeholder="new task id">
                                </div>
                                <div class="six wide column">
                                    <input type="number" class="form-control" name="task-points" placeholder="points">
                                </div>
                                <div class="two wide column">
                                    <input class="ui button" type="submit">
                                </div>
                            </div>
                        </form>

                    </div>
                    <div class="fourteen column wide">
                        <h3>Added</h3>
                        <table class="ui table">
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

                                    <form action="/admin/contest/{{$contest->id}}/task/{{$task->id}}" method="POST">
                                        {!! csrf_field() !!}
                                        {!! method_field('DELETE') !!}
                                        <button class="ui button red" type="submit">remove</button>
                                    </form>
                                    <a href="/admin/task/{{$task->id}}/edit" class="ui button">edit</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>                

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="eight column wide">
            <div class="ui segment">
                <div class="ui header">Submissions</div>
                <div class="panel-body">
                    <table class="ui table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>date</th>
                                <th>user</th>
                                <th>task</th>
                                <th>submitted answer</th>
                                <th>status</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contest->submissions as $submission)
                            <tr>
                                <td>{{$submission->id}}</td>
                                <td>{{$submission->added_time}}</td>
                                <td>
                                    <a href="{{'/user/' . $submission->participation->user->id}}">
                                        {{$submission->participation->user->username}}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{'/contest/' . $contest->id . '/task/' . $submission->task->id}}">
                                    {{$submission->task->title}}
                                    </a>
                                </td>
                                <td>{{$submission->submitted_answer}}</td>
                                <td>{{$submission->status}}</td>
                                <td>
                                <a href="#" class="ui button">do nothing</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>            
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="eight column wide">
            @include('partials.scoreboard', ['data' => $contest->getScoreBoardData()])
        </div>
    </div>

</div>
@endsection
