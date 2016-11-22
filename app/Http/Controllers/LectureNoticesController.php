<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LectureNotice;
use App\Lecture;
use App;

class LectureNoticesController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }

    public function index(Lecture $lecture) {
        $lectureNotices = LectureNotice::all();

        return view('lecture_notices.index', ['lectureNotices'=>$lectureNotices, 'lecture'=>$lecture]);
    }

    public function create(Lecture $lecture, LectureNotice $notice) {
        $lectures = Lecture::all();
        $notice->lecture_id = $lecture->id;

        return view('lecture_notices.create', ['lectureNotice'=>$notice,'lectures'=>$lectures]);
    }

    public function display(Lecture $lecture, LectureNotice $notice) {
        return view('lecture_notices.display', ['lectureNotice'=>$notice]);
    }

    public function store(Lecture $lecture, Request $request) {
        $data = $request->only('lecture_id','name','description','filename');

        if ($notice = LectureNotice::create($data)) {
            return redirect()->action('LectureNoticesController@index', [$notice->lecture_id]);
        } else {
            return redirect()->action('LectureNoticesController@create', [$lecture->id]);
        }
    }

    public function edit(Lecture $lecture, LectureNotice $notice) {
        $lectures = Lecture::all();
        return view('lecture_notices.edit', ['lectureNotice'=>$notice, 'lectures'=>$lectures]);
    }

    public function update(Lecture $lecture, LectureNotice $notice, Request $request) {
        $data = $request->only('lecture_id','name','description','filename');
        if ($notice->update($data)) {
            return redirect()->action('LectureNoticesController@index', [$notice->lecture_id]);
        } else {
            return redirect()->action('LectureNoticesController@edit', [$notice->lecture_id, $lectureNotice->id]);
        }
    }

    public function delete(Lecture $lecture, LectureNotice $notice) {
        $id = $notice->lecture_id;
        if ($notice->delete()) {
            return redirect()->action('LectureNoticesController@index', [$id]);
        } else {
            App::abort(500, 'Could not delete Lecture Notice');
        }

    }

}
