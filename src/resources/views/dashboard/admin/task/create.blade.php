@extends('layouts.app')

@section('content')
<br>
<div class="container">
    <div class="row">
        <div class="col-md-8">

            <div class="panel panel-default">
                <div class="panel-heading">Add task</div>
                <div class="panel-body">
                    <form method="POST" action="/admin/task">
                        {!! csrf_field() !!}
                        <div class="form-group">
                            <label for="" class="control-label">Task Title</label>
                            <input type="text" class="form-control" name="title">
                        </div>
                        <div class="form-group">
                            <label for="" class="control-label">Task Description</label>
                            <textarea type="text" class="form-control" name="description" rows="10"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="" class="control-label">Task Category</label>
                            <select class="form-control" name="category">
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="" class="control-label">Default points</label>
                            <input type="number" class="form-control" name="points" placeholder="optional">
                        </div>
                        <div class="form-group">
                            <label for="" class="control-label">answer</label>
                            <input type="text" class="form-control" name="answer" placeholder="flag{your_answer_here}">
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
