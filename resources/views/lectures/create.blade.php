@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create Lecture</div>

                <div class="panel-body">
                    <form method="post" action="{{ action('LecturesController@store', [$lecture->id]) }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>Class:</label>
                            <select class="form-control" name="class_id">
                            @foreach ($courses as $course)
                                <option value="{{ $course->id }}">{{ $course->name }}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Name:</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') ?: $lecture->name }}">
                        </div>
                        <div class="form-group">
                            <label>Start Time:</label>
                            <input type="text" name="start_time" class="form-control" value="{{ old('start_time') ?: $lecture->start_time }}">
                        </div>
                        <div class="form-group">
                            <label>End Time:</label>
                            <input type="text" name="end_time" class="form-control" value="{{ old('end_time') ?: $lecture->end_time }}">
                        </div>

                        <button type="submit" class="btn btn-primary">Create Lecture</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
