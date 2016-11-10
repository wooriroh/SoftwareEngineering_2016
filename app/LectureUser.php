<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LectureUser extends Model
{
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function lecture() {
        return $this->belongsTo(Lecture::class);
    }
}
