@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Displaying Courses</div>

                <div class="panel-body">
                    <div class="form-group">
                        <label>Name:</label>
                        <p>{{ $course->name }}</p>
                    </div>
                    <div class="form-group">
                        <label>Description:</label>
                        <p>{{ $course->description }}</p>
                    </div>

                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">List of Lectures</div>

                <div class="panel-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Lecture Title</th>
                                <th>Start time</th>
                                <th>End time</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($course->lectures as $lecture)
                            <tr>
                                <td><a href="{{action('LecturesController@display', [$lecture->id])}}">{{ $lecture->name }}</a></td>
                                <td>{{ $lecture->start_time }}</td>
                                <td>{{ $lecture->end_time }}</td>
                                <td>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">List of Users</div>

                <div class="panel-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>User</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($course->users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>
                                    <form action="{{ action('CourseUsersController@delete') }}" method="post">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="delete">
                                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                                        <input type="hidden" name="class_id" value="{{ $course->id }}">
                                        <button type="submit" class="btn btn-xs btn-danger">Unenroll</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <form action="{{ action('CourseUsersController@store') }}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="class_id" value="{{ $course->id }}">
                        <div class="form-group">
                            <label>Enroll user:</label>
                            <select name="user_id" class="form-control">
                                @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Enroll user</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
