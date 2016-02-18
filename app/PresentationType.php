<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PresentationType extends Model
{
    public function presentations(){
      return $this->hasMany("App\Presentation", "type");
    }
}
