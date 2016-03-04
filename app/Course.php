<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function presentations(){
        return $this->hasMany("App\Presentation", "course");
    }

    public function subject(){
        return $this->belongsTo("App\Subject", "subject_code");
    }

    public function professors(){
        return $this->belongsToMany('App\User', 'user_courses');
    }
}
