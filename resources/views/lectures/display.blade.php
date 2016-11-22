@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Displaying Lecture</div>

                <div class="panel-body">
                    <div class="form-group">
                        <label>Name:</label>
                        <p>{{ $lecture->name }}</p>
                    </div>
                    <div class="form-group">
                        <label>Course:</label>
                        <p>{{ $lecture->course->name }}</p>
                    </div>
                    <div class="form-group">
                        <label>Start Time:</label>
                        <p>{{ $lecture->start_time }}</p>
                    </div>
                    <div class="form-group">
                        <label>End Time:</label>
                        <p>{{ $lecture->end_time }}</p>
                    </div>

                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading clearfix">
                    <h5 class="pull-left">
                        List of Lecture Notices
                    </h5>
                    <div class="pull-right">
                        <a href="{{ action('LectureNoticesController@create', [$lecture->id]) }}" class="btn btn-default btn-primary">Create</a>
                    </div>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($lecture->lectureNotices as $notice)
                        <tr>
                            <td><a href="{{ action('LectureNoticesController@display', [$lecture->id, $notice->id]) }}">{{ $notice->name }}</td>
                            <td>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop
