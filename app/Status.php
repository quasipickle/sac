<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    public $incrementing = false;

    public function presentations(){
        return $this->hasMany("App\Presentation", "status");
    }
}
