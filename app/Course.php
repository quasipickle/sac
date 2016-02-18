<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function presentations(){
      return $this->hasMany("App\Presentation", "course");
    }
}
