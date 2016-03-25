@extends('layouts.app')

@section('content')
<br>
<div class="container">
    <div class="row">

        <div class="col-md-8">

            <div class="panel panel-default">
                <div class="panel-heading">Add Contest</div>
                <div class="panel-body">
                    <form method="POST" action="/admin/contest">
                        {!! csrf_field() !!}
                        <div class="form-group">
                            <label for="" class="control-label">Contest Name</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                        <div class="form-group">
                            <label for="" class="control-label">Category Description</label>
                            <textarea type="text" class="form-control" name="description" rows="10"></textarea>
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
@endsection
