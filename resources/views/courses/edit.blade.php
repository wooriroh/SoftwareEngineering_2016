@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Course</div>

                <div class="panel-body">
                    <form method="post" action="{{ action('CoursesController@update', [$course->id]) }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>Name:</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') ?: $course->name }}">
                        </div>
                        <div class="form-group">
                            <label>Description:</label>
                            <input type="text" name="description" class="form-control" value="{{ old('description') ?: $course->descriptio }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Update Course</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
