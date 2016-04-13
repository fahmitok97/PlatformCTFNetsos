@extends('layouts.app')

@section('content')
<br><br><br><br>
<div class="ui container">
    <div class="ui grid">
        <div class="sixteen wide column">

            <div class="ui segment">
                <div class="ui header">Contests</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-10">
                            <table class="ui table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>name</th>
                                        <th>description</th>
                                        <th>start time</th>
                                        <th>end time</th>
                                        <th>status</th>
                                        <th>action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($contests as $contest)
                                    <tr>
                                        <td>{{$contest->id}}</td>
                                        <td>{{$contest->name}}</td>
                                        <td>{{$contest->description}}</td>
                                        <td>{{$contest->start_date}}</td>
                                        <td>{{$contest->end_date}}</td>
                                        <td>{{$contest->active ? "Active" : "Inactive"}}</td>
                                        <td><a href="/admin/contest/{{$contest->id}}/edit" class="ui button">manage</a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>                
                        </div>
                        <div class="col-md-2">
                            <a href="/admin/contest" class="ui button">see more list</a>
                            <a href="/admin/contest/create" class="ui blue button">create new contest</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="ten wide column">

            <div class="ui segment">
                <div class="ui header">Tasks</div>
                <div class="panel-body">
                    <table class="ui table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>title</th>
                                <th>description</th>
                                <th>category</th>
                                <th>default_points</th>
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
                                <td><a href="/admin/task/{{$task->id}}/edit" class="ui button">edit</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>                


                    <a href="/admin/task" class="ui button">see more list</a>
                    <a href="/admin/task/create" class="ui blue button">create new task</a>
                </div>
            </div>
        </div>
        <div class="six wide column">

            <div class="ui segment">
                <div class="ui header">Categories</div>
                <div class="panel-body">
                    <table class="ui table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>name</th>
                                <th>description</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                            <tr>
                                <td>{{$category->id}}</td>
                                <td>{{$category->name}}</td>
                                <td>{{$category->description}}</td>
                                <td><a href="/admin/category/{{$category->id}}/edit" class="ui button">edit</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>                


                    <a href="/admin/category" class="ui button">see more list</a>
                    <a href="/admin/category/create" class="ui button blue">create new category</a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
