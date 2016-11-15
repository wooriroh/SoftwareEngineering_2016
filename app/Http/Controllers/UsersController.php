<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Course;
use Hash;
use App;

class UsersController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $this->authorize('show-users');
        $users = User::all();

        return view('users.index', ['users'=>$users]);
    }

    public function display(User $user) {
        $courses = Course::all();
        return view('users.display', ['user'=>$user, 'courses'=>$courses]);
    }

    public function create(User $user) {
        return view('users.create', ['user'=>$user]);
    }

    public function store(Request $request) {
        $data = $request->only('name','email','student_number','level');
        $password = str_random(8);
        $data['password'] = Hash::make($password);
        if (User::create($data)) {
            return redirect()->action('UsersController@index');
        } else {
            return redirect()->action('UsersController@create', [$user->id]);
        }
    }

    public function edit(User $user) {
        return view('users.edit', ['user'=>$user]);
    }

    public function update(User $user, Request $request) {
        if ($user->update($request->only('name','email','student_number','level'))) {
            return redirect()->action('UsersController@index');
        } else {
            return redirect()->action('UsersController@edit', [$user->id]);
        }
    }

    public function delete(User $user) {
        if ($user->delete()) {
            return redirect()->action('UsersController@index');
        } else {
            App::abort(500, 'Could not delete user');
        }

    }



}
