<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function presentations(){
      return $this->hasMany("App\Presentation", "course");
    }

    public function professors(){
    	return $this->belongsToMany('App\Professor', 'professor_courses');
    }
}
