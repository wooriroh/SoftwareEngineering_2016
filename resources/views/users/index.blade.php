@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Users</div>

                <div class="panel-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>E-mail</th>
                                <th>Student Number</th>
                                <th>Level</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>
                                        <a href="{{ action('UsersController@display', [$user->id]) }}">{{ $user->name }}</a>
                                    </td>
                                    <td>
                                        {{ $user->email }}
                                    </td>
                                    <td>
                                        {{ $user->student_number }}
                                    </td>
                                    <td>
                                        {{ $user->level }}
                                    </td>
                                    <td>
                                        <a class="btn btn-xs btn-primary" href="{{ action('UsersController@edit', [$user->id]) }}">Edit User</a>
                                        <form method="post" action="{{ action('UsersController@delete', [$user->id]) }}">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button class="btn btn-xs btn-danger">Delete User</a>
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
