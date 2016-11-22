<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\LectureUser;
use App\Lecture;
use Auth;

class LectureUserController extends Controller
{

    private function isUserInClassroom(Request $request)
    {
        return ($request->get('_in_classroom') ?: false);
    }

    public function checkin(Request $request)
    {
        $inClassroom = $this->isUserInClassroom($request);

        if (!$inClassroom) {
            return response()->json(['error'=>'User is not in the correct class room.'], 403);
        }

        $lecture = Lecture::findOrFail($request->get('lecture_id'));

        $lu = LectureUser::firstOrNew(['user_id'=>Auth::guard('api')->id(), 'lecture_id'=>$lecture->id]);
        if (!$lu->exists) {
            $lu->arrival_time = \Carbon\Carbon::now();
            $lu->save();
        }

        return response()->json($lu);

    }

    public function checkout(Request $request)
    {

        $inClassroom = $this->isUserInClassroom($request);

        if (!$inClassroom) {
            return response()->json(['error'=>'User is not in the correct class room.'], 403);
        }

        $lecture = Lecture::findOrFail($request->get('lecture_id'));

        $lu = LectureUser::where(['user_id'=>Auth::guard('api')->id(), 'lecture_id'=>$lecture->id])->firstOrFail();

        $lu->leave_time = \Carbon\Carbon::now();
        $lu->save();

        return response()->json($lu);

    }
}
