@extends('layouts.app')

@section('content')
<br>
<div class="container">
    <div class="row">
        <div class="col-md-8">

            <div class="panel panel-default">
                <div class="panel-heading">Add task</div>
                <div class="panel-body">
                    <form method="POST" action="/admin/task/{{$task->id}}">
                        {!! csrf_field() !!}
                        {!! method_field('PUT') !!}
                        <div class="form-group">
                            <label for="" class="control-label">Task Title</label>
                            <input type="text" class="form-control" name="title" value="{{$task->title}}">
                        </div>
                        <div class="form-group">
                            <label for="" class="control-label">Task Description</label>
                            <textarea type="text" class="form-control" name="description" rows="10">{{$task->description}}</textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-btn fa-sign-in"></i>Add
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>

        </div>
    </div>
</div>
@endsection
