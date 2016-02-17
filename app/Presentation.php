<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Presentation extends Model
{
    protected $guarded = ['id', 'owner'];

    public function course(){
        return $this->belongsTo("App\Course", "course");
    }

    public function type(){
        return $this->hasOne("App\PresentationType", "type");
    }

    public function owner(){
        return $this->belongsTo("App\User", "owner");
    }
}
