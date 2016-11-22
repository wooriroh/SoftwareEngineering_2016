@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Notice</div>
                <div class="panel-body">
                    <form method="post" action="{{ action('LectureNoticesController@update', [$lectureNotice->lecture->id, $lectureNotice->id]) }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>Lecture:</label>
                            <select class="form-control" name="lecture_id">
                            @foreach ($lectures as $lecture)
                                <option value="{{ $lecture->id }}">{{ $lecture->course->name }} - {{ $lecture->name }}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Name:</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') ?: $lectureNotice->name }}">
                        </div>
                        <div class="form-group">
                            <label>Description:</label>
                            <input type="text" name="description" class="form-control" value="{{ old('description') ?: $lectureNotice->description }}">
                        </div>
                        <div class="form-group">
                            <label>Filename:</label>
                            <input type="text" name="filename" class="form-control" value="{{ old('filename') ?: $lectureNotice->filename }}">
                        </div>

                        <button type="submit" class="btn btn-primary">Update Notice</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
