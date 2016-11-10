@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Courses</div>

                <div class="panel-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Description</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($courses as $course)
                                <tr>
                                    <td>
                                        <a href="{{ action('CoursesController@display', [$course->id]) }}">{{ $course->name }}</a>
                                    </td>
                                    <td>
                                        {{ $course->description }}
                                    </td>
                                    <td>
                                        <a class="btn btn-xs btn-primary" href="{{ action('CoursesController@edit', [$course->id]) }}">Edit Course</a>
                                        <form method="post" action="{{ action('CoursesController@delete', [$course->id]) }}">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button class="btn btn-xs btn-danger">Delete Course</a>
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
