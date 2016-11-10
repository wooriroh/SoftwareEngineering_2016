<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lecture extends Model
{
    protected $fillable = ['name','class_id','start_time','end_time'];

    protected $dates = ['start_time','end_time'];

    public function users() {
        return $this->belongsToMany(User::class)->withTimestamps()->withPivot('attendance_status', 'arrival_time', 'leave_time');
    }
}
