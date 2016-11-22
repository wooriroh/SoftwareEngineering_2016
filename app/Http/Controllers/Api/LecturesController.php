<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Course;

class LecturesController extends Controller
{

    public function index(Course $course)
    {
        $user = Auth::guard('api')->user();
        if ($course->exists) {
            return response()->json($course->lectures);
        }
    }
}
