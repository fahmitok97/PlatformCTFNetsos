@extends('layouts.app')

@section('content')
<br>
<div class="container">

    <h1>User Information</h1>

    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">User information</div>
                <div class="panel-body">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>username</td>
                                <td>{{$user->username}}</td>
                            </tr>
                            <tr>
                                <td>fullname</td>
                                <td>{{$user->fullname}}</td>
                            </tr>
                            <tr>
                                <td>email</td>
                                <td>{{$user->email}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">Participations</div>
                <div class="panel-body">
                    <table class="table">
                        <thead>
                            <th>#</th>
                            <th>contest name</th>
                            <th>position</th>
                            <th>points</th>
                        </thead>
                        <tbody>
                            @foreach($user->participations as $participation)
                                <tr>
                                    <td>{{ $participation->id }}</td>
                                    <td>{{ $participation->contest->name }}</td>
                                    <td>{{ $participation->final_position }}</td>
                                    <td>{{ $participation->final_points }}</td>
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
