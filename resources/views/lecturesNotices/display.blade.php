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
                        <label>Start Time:</label>
                        <p>{{ $lecture->start_time }}</p>
                    </div>
                    <div class="form-group">
                        <label>End Time:</label>
                        <p>{{ $lecture->end_time }}</p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@stop
