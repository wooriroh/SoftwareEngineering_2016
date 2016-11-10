<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

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

}
