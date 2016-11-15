<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\CourseUser;

class CourseUsersController extends Controller
{
    public function delete(Request $request) {
        $user_id = $request->get('user_id');
        $class_id = $request->get('class_id');

        $cu = CourseUser::where(['user_id'=>$user_id,'class_id'=>$class_id])->first();
        if ($cu) {
            $cu->delete();
            return redirect()->back();
        }
        return redirect()->back();
    }

    public function store(Request $request) {
        $user_id = $request->get('user_id');
        $class_id = $request->get('class_id');
        $cu = CourseUser::where(['user_id'=>$user_id,'class_id'=>$class_id])->first();
        if (!$cu) {
            $cu = CourseUser::create(['user_id'=>$user_id, 'class_id'=>$class_id]);
            dd($cu);
            return redirect()->back();
        }
        return redirect()->back();
    }
}
