@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit User</div>

                <div class="panel-body">
                    <form method="post" action="{{ action('UsersController@update', [$user->id]) }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>Name:</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') ?: $user->name }}">
                        </div>
                        <div class="form-group">
                            <label>E-mail:</label>
                            <input type="text" name="email" class="form-control" value="{{ old('email') ?: $user->email }}">
                        </div>
                        <div class="form-group">
                            <label>Student number:</label>
                            <input type="text" name="student_number" class="form-control" value="{{ old('student_number') ?: $user->student_number }}">
                        </div>
                        <div class="form-group">
                            <label>User level:</label>
                            <input type="text" name="level" class="form-control" value="{{ old('level') ?: $user->level }}">
                        </div>

                        <button type="submit" class="btn btn-primary">Update User</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
