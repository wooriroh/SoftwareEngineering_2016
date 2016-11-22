<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Course;
use App\Lecture;

class LectureNoticesController extends Controller
{

    public function index(Course $course, Lecture $lecture)
    {
        return response()->json($lecture->lectureNotices);
    }

}
