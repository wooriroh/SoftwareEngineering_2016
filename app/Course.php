<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{

    protected $table = 'classes';

    protected $fillable = ['name','description'];

}
