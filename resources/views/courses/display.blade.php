@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Displaying Courses</div>

                <div class="panel-body">
                    <div class="form-group">
                        <label>Name:</label>
                        <p>{{ $course->name }}</p>
                    </div>
                    <div class="form-group">
                        <label>Description:</label>
                        <p>{{ $course->description }}</p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@stop
