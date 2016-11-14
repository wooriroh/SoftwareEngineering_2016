@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    LecturesNotices
                    <a class="btn btn-primary btn-sm pull-right" href="{{ action('LecturesNoticesController@create') }}">Create LectureNotices</a>
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
                            @foreach ($lecturesNotices as $lectureNotice)
                                <tr>
                                    <td>
                                        <a href="{{ action('LecturesNoticesController@display', [$lectureNotices->id]) }}">{{ $lectureNotices->name }}</a>
                                    </td>
                                    <td>
                                        {{ $lectureNotices->description }}
                                    </td>
                                    <td>
                                        {{ $lectureNotices->filename}}
                                    </td>
                                    <td>
                                        <a class="btn btn-xs btn-primary" href="{{ action('LecturesNoticesController@edit', [$lectureNotices->id]) }}">Edit lectureNotices</a>
                                        <form method="post" action="{{ action('LecturesNoticesController@delete', [$lectureNotices->id]) }}">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button class="btn btn-xs btn-danger">Delete LectureNotices</a>
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
