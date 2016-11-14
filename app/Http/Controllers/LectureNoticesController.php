<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LectureNoticesController extends Controller
{
    //
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $lectureNotices = LectureNotice::all();
  return view('lectureNotices.index', ['lectureNotices'=>$lectureNotices]);

    }

    public function create(LectureNotice $lectureNotices ){
        $lectureNotices = LecturesNotices::all();
      return view('LecturesNotices.create', ['LectureNotices'=>$LectureNotices]);
    }

    public function display(LectureNotices $lectureNotices) {
      return view('LecturesNotices.create', ['LectureNotices'=>$LectureNotices]);
    }

    public function store(Request $request) {
        $data = $request->only('lecture_id','name','description','filename');

        if (LectureNotices::create($data)) {
            return redirect()->action('LecturesNoticesController@index');
        } else {
            return redirect()->action('LecturesNoticesController@create', [$lectureNotices->id]);
        }
    }

    public function edit(LectureNotices $lectureNotices) {
        $LectureNotices = LecturesNotices::all();
        return view('LecturesNotices.edit', ['LectureNotices'=>$LectureNotices, 'lectureNotices'=>$lectureNotices]);
    }

    public function update(lectureNotices $lectureNotices, Request $request) {
        $data = $request->only('lecture_id','name','description','filename');
        if ($lectureNotices->update($data)) {
            return redirect()->action('LecturesNoticesController@index');
        } else {
            return redirect()->action('LecturesNoticesController@edit', [$lectureNotices->id]);
        }
    }

    public function delete(lectureNotices $lectureNotices) {
        if ($lectureNotices->delete()) {
            return redirect()->action('LecturesNoticesController@index');
        } else {
            App::abort(500, 'Could not delete lectureNotices');
        }

    }
}

}
