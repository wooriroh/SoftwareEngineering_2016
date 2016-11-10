<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Lecture;
use App\Course;

class LecturesController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $lectures = Lecture::all();

        return view('lectures.index', ['lectures'=>$lectures]);
    }

    public function display(Lecture $lecture) {
        return view('lectures.display', ['lecture'=>$lecture]);
    }

    public function create(Lecture $lecture) {
        $courses = Course::all();
        return view('lectures.create', ['lecture'=>$lecture, 'courses'=>$courses]);
    }

    public function store(Request $request) {
        $data = $request->only('class_id','name','start_time','end_time');

        if (Lecture::create($data)) {
            return redirect()->action('LecturesController@index');
        } else {
            return redirect()->action('LecturesController@create', [$lecture->id]);
        }
    }

    public function edit(Lecture $lecture) {
        $courses = Course::all();
        return view('lectures.edit', ['lecture'=>$lecture, 'courses'=>$courses]);
    }

    public function update(Lecture $lecture, Request $request) {
        $data = $request->only('class_id','name','start_time','end_time');
        if ($lecture->update($data)) {
            return redirect()->action('LecturesController@index');
        } else {
            return redirect()->action('LecturesController@edit', [$lecture->id]);
        }
    }

    public function delete(Lecture $lecture) {
        if ($lecture->delete()) {
            return redirect()->action('LecturesController@index');
        } else {
            App::abort(500, 'Could not delete lecture');
        }

    }
}
