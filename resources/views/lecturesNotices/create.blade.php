@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create lectureNotices</div>

                <div class="panel-body">
                    <form method="post" action="{{ action('LecturesNoticesController@store', [$LectureNotices->id]) }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>lecture:</label>
                            <select class="form-control" name="lecture_id">
                            @foreach ($lectureNotices as $lectureNotice)
                                <option value="{{ $lectureNotices->id }}">{{ $lectureNotices->name }}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>description:</label>
                            <input type="text" name="description" class="form-control" value="{{ old('description') ?: $lectureNotices->description }}">
                        </div>
                        <div class="form-group">
                            <label>name:</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') ?: $lectureNotices->name }}">
                        </div>
                        <div class="form-group">
                            <label>filename:</label>
                            <input type="text" name="filename" class="form-control" value="{{ old('filename') ?: $lectureNotices->filename }}">
                        </div>

                        <button type="submit" class="btn btn-primary">Create LectureNotices</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
