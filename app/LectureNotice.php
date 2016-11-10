<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LectureNotice extends Model
{
    protected $fillable = ['name','description','filename'];

    public function lecture() {
        return $this->belongsTo(Lecture::class);
    }
}
