<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{

    protected $table = 'classes';

    protected $fillable = ['name','description'];

    public function users() {
        return $this->belongsToMany(User::class,'class_user', 'user_id', 'class_id')->withTimestamps()->withPivot('role');
    }

}
