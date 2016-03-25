@extends('layouts.app')

@section('content')
<br>
<div class="container">
    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-default">
                <div class="panel-heading">Contests</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-10">
                            <table class="table table-condensed">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>name</th>
                                        <th>description</th>
                                        <th>action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($contests as $contest)
                                    <tr>
                                        <td>{{$contest->id}}</td>
                                        <td>{{$contest->name}}</td>
                                        <td>{{$contest->description}}</td>
                                        <td><a href="/admin/contest/{{$contest->id}}/edit" class="btn btn-default">edit</a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>                
                        </div>
                        <div class="col-md-2">
                            <a href="/admin/contest" class="btn btn-default">see more list</a>
                            <a href="/admin/contest/create" class="btn btn-default">create new contest</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-md-8">

            <div class="panel panel-default">
                <div class="panel-heading">Tasks</div>
                <div class="panel-body">
                    <table class="table table-condensed">
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
                                <td><a href="/admin/task/{{$task->id}}/edit" class="btn btn-default">edit</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>                


                    <a href="/admin/task" class="btn btn-default">see more list</a>
                    <a href="/admin/task/create" class="btn btn-default">create new task</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">

            <div class="panel panel-default">
                <div class="panel-heading">Categories</div>
                <div class="panel-body">
                    <table class="table table-condensed">
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
                                <td><a href="/admin/category/{{$category->id}}/edit" class="btn btn-default">edit</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>                


                    <a href="/admin/category" class="btn btn-default">see more list</a>
                    <a href="/admin/contest/create" class="btn btn-default">create new contest</a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
