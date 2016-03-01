<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Professor extends User{

	public function is_professor(){
        return true;
    }

    public function courses(){
    	return $this->belongsToMany('App\Course', 'professor_courses');
    }
}
