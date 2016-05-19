@extends('layouts.app')

@section('content')
<br>
<div class="container">
    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-default">
                <div class="panel-body">
                    <a href="{{ url('/admin/category/create') }}" class="btn btn-default">create new category</a>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">All Categories</div>
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
                                <td><a href="{{ url('admin/category/'. $category->id . '/edit'); }}" class="btn btn-default">edit</a></td>
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
