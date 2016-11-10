<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseUser extends Model
{
    protected $table = 'class_user';

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function course() {
        return $this->belongsTo(Course::class);
    }
}
