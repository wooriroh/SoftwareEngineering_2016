<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LectureNotice extends Model
{
    protected $fillable = ['lecture_id','name','description','filename'];


    public function users() {
        return $this->belongsToMany(User::class)->withTimestamps()->withPivot('user_id');
    }

    public function lecture() {
        return $this->belongsTo(Lecture::class);
    }
}
