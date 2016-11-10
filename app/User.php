<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'student_number', 'level'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function courses() {
        return $this->belongsToMany(Course::class,'class_user', 'class_id', 'user_id')->withTimestamps()->withPivot('role');
    }

    public function lectures() {
        return $this->belongsToMany(Lecture::class)->withTimestamps()->withPivot('attendance_status', 'arrival_time', 'leave_time');
    }
}
