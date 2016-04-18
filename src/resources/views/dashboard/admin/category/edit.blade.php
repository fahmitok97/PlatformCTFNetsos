@extends('layouts.app')

@section('content')
<br>
<div class="container">
    <div class="row">
        <div class="col-md-8">

            <div class="panel panel-default">
                <div class="panel-heading">Add category</div>
                <div class="panel-body">
                    <form method="POST" action="{{ url('/admin/category' . $category->id) }}">
                        {!! csrf_field() !!}
                        {!! method_field('PUT') !!}
                        <div class="form-group">
                            <label for="" class="control-label">Category Name</label>
                            <input type="text" class="form-control" name="name" value="{{$category->name}}">
                        </div>
                        <div class="form-group">
                            <label for="" class="control-label">Category Description</label>
                            <textarea type="text" class="form-control" name="description" rows="10">{{$category->description}}</textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-btn fa-sign-in"></i>Update
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
