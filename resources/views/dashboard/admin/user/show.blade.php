@extends('layouts.app')

@section('content')
<br><br><br><br>
<div class="ui container">

    <h1 class="ui header">User Information</h1>

    <div class="ui grid">
        <div class="six wide column">
            <div class="ui segment">
                <h3 class="ui header">User information</h3>
                <table class="ui table">
                    <tbody>
                        <tr>
                            <td>username</td>
                            <td>{{$user->username}}</td>
                        </tr>
                        <tr>
                            <td>fullname</td>
                            <td>{{$user->fullname}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="ten wide column">
            <div class="ui segment">
                <h1 class="ui header">Participations</h1>
                <table class="ui table">
                    <thead>
                        <th>#</th>
                        <th>Contest Name</th>
                        <th>Position</th>
                        <th>Points</th>
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
@endsection
