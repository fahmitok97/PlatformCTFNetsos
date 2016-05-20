@extends('layouts.app')

@section('content')
<br>
<div class="container">
    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-default">
                <div class="panel-body">
                    <a href="{{ url('/admin/category/create') }}" class="btn btn-default">create new Contest</a>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">All Contests</div>
                <div class="panel-body">
                    <table class="table table-condensed">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>name</th>
                                <th>description</th>
                                <th>active</th>
                                <th>start date</th>
                                <th>end date</th>
                                <th>participants</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contests as $contest)
                            <tr>
                                <td>{{$contest->id}}</td>
                                <td>{{$contest->name}}</td>
                                <td>{{$contest->description}}</td>
                                <td>{{$contest->active}}</td>
                                <td>{{$contest->start_date}}</td>
                                <td>{{$contest->end_date}}</td>
                                <td>{{count($contest->participations)}}</td>
                                <td><a href="{{ url('/admin/contest/' . $contest->id . '/edit') }} class="btn btn-default">edit</a></td>
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
