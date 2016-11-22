<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LectureUser extends Model
{

    protected $table = 'lecture_user';

    protected $fillable = ['user_id', 'lecture_id', 'attendance_status', 'arrival_time', 'leave_time'];

    protected $dates = ['arrival_time', 'leave_time'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function lecture() {
        return $this->belongsTo(Lecture::class);
    }
}
