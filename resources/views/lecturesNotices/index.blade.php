@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Lectures
                    <a class="btn btn-primary btn-sm pull-right" href="{{ action('LecturesController@create') }}">Create Lecture</a>
                </div>

                <div class="panel-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Start Time</th>
                                <th>End Time</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($lectures as $lecture)
                                <tr>
                                    <td>
                                        <a href="{{ action('LecturesController@display', [$lecture->id]) }}">{{ $lecture->name }}</a>
                                    </td>
                                    <td>
                                        {{ $lecture->start_time }}
                                    </td>
                                    <td>
                                        {{ $lecture->end_time }}
                                    </td>
                                    <td>
                                        <a class="btn btn-xs btn-primary" href="{{ action('LecturesController@edit', [$lecture->id]) }}">Edit Lecture</a>
                                        <form method="post" action="{{ action('LecturesController@delete', [$lecture->id]) }}">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button class="btn btn-xs btn-danger">Delete Lecture</a>
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
