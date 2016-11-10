<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lecture extends Model
{
    protected $fillable = ['name','start_time','end_time'];

    public function users() {
        return $this->belongsToMany(User::class);
    }
}
