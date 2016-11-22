@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Lecture Notices
                    <a class="btn btn-primary btn-sm pull-right" href="{{ action('LectureNoticesController@create', [$lecture->id]) }}">Create notice</a>
                </div>

                <div class="panel-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Filename</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($lectureNotices as $lectureNotice)
                                <tr>
                                    <td>
                                        <a href="{{ action('LectureNoticesController@display', [$lectureNotice->lecture_id, $lectureNotice->id]) }}">{{ $lectureNotice->name }}</a>
                                    </td>
                                    <td>
                                        {{ $lectureNotice->description }}
                                    </td>
                                    <td>
                                        {{ $lectureNotice->filename}}
                                    </td>
                                    <td>
                                        <a class="btn btn-xs btn-primary" href="{{ action('LectureNoticesController@edit', [$lectureNotice->lecture_id, $lectureNotice->id]) }}">Edit notice</a>
                                        <form method="post" action="{{ action('LectureNoticesController@delete', [$lectureNotice->lecture_id, $lectureNotice->id]) }}">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button class="btn btn-xs btn-danger">Delete notice</a>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
