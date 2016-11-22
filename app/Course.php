<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{

    protected $table = 'classes';

    protected $fillable = ['name','description'];

    public function users() {
        return $this->belongsToMany(User::class,'class_user', 'class_id', 'user_id')->withTimestamps()->withPivot('role');
    }

    public function lectures() {
        return $this->hasMany(Lecture::class, 'class_id');
    }

}
