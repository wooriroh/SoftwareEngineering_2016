@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Displaying User</div>

                <div class="panel-body">
                    <div class="form-group">
                        <label>Name:</label>
                        <p>{{ $user->name }}</p>
                    </div>
                    <div class="form-group">
                        <label>E-mail:</label>
                        <p>{{ $user->email }}</p>
                    </div>
                    <div class="form-group">
                        <label>Student number:</label>
                        <p>{{ $user->student_number }}</p>
                    </div>
                    <div class="form-group">
                        <label>User level:</label>
                        <p>{{ $user->level }}</p>
                    </div>

                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">List of Courses</div>

                <div class="panel-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Course</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user->courses as $course)
                            <tr>
                                <td>{{ $course->name }}</td>
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
                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                        <div class="form-group">
                            <label>Enroll in class:</label>
                            <select name="class_id" class="form-control">
                                @foreach ($courses as $course)
                                <option value="{{ $course->id }}">{{ $course->name }}</option>
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
