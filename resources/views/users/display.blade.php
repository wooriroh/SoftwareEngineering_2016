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
        </div>
    </div>
</div>
@stop
