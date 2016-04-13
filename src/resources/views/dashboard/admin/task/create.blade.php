@extends('layouts.app')

@section('content')
<br><br><br><br>
<div class="ui container">
    <div class="ui grid">
        <div class="ten wide column">

            <div class="ui segment">
                <div class="ui header">Add task</div>
                <div>
                    <form method="POST" action="/admin/task" class="ui form">
                        {!! csrf_field() !!}
                        <div class="field">
                            <label for="" class="control-label">Task Title</label>
                            <input type="text" class="form-control" name="title">
                        </div>
                        <div class="field">
                            <label for="" class="control-label">Task Description</label>
                            <textarea type="text" class="form-control" name="description" ui grids="10"></textarea>
                        </div>
                        <div class="field">
                            <label for="" class="control-label">Task Category</label>
                            <select class="form-control" name="category">
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="field">
                            <label for="" class="control-label">Default points</label>
                            <input type="number" class="form-control" name="points" placeholder="optional">
                        </div>
                        <div class="field">
                            <label for="" class="control-label">answer</label>
                            <input type="text" class="form-control" name="answer" placeholder="flag{your_answer_here}">
                        </div>
                        <div class="field">
                            <button type="submit" class="ui button">
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
