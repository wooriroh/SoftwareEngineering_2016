<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Course;
use App\User;
use App;

class CoursesController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $this->authorize('show-users');
        $courses = Course::all(); // Course: Model

        return view('courses.index', ['courses'=>$courses]);
    }

    public function display(Course $course) {
        $users = User::all();
        return view('courses.display', ['course'=>$course, 'users'=>$users]);
    }

    public function create(Course $course) {
        return view('courses.create', ['course'=>$course]);
    }

    public function store(Request $request) {
        $data = $request->only('id','name','description');
        if (Course::create($data)) {
            return redirect()->action('CoursesController@index');
        } else {
            return redirect()->action('CoursesController@create', [$course->id]);
        }
    }

    public function edit(Course $course) {
        return view('courses.edit', ['course'=>$course]);
    }

    public function update(Course $course, Request $request) {
        if ($course->update($request->only('name','description'))) {
            return redirect()->action('CoursesController@index');
        } else {
            return redirect()->action('CoursesController@edit', [$course->id]);
        }
    }

    public function delete(Course $course) {
        if ($course->delete()) {
            return redirect()->action('CoursesController@index');
        } else {
            App::abort(500, 'Could not delete course');
        }

    }
}
