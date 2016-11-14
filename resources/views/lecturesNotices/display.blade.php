@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Displaying LectureNotice</div>

                <div class="panel-body">
                    <div class="form-group">
                        <label>Name:</label>
                        <p>{{ $lectureNotices->name }}</p>
                    </div>
                    <div class="form-group">
                        <label>description:</label>
                        <p>{{ $lectureNotices->description }}</p>
                    </div>
                    <div class="form-group">
                        <label>filename:</label>
                        <p>{{ $lectureNotices->filename}}</p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@stop
