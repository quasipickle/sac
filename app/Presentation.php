<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Presentation extends Model
{
    protected $guarded = ['id', 'owner'];

    protected $dates = ['submitted_at', 'approved_at'];

    public function course(){
        return $this->belongsTo("App\Course", "course");
    }

    public function type(){
        return $this->hasOne("App\PresentationType", "type");
    }

    public function owner(){
        return $this->belongsTo("App\User", "owner");
    }

    public function set_submit($submitted){
        $time = null;
        if($submitted)
            $time = Carbon::now();
        $this->submitted = $submitted;
        $this->submitted_at = $time;
    }


    public function set_approval($approved){
        $time = null;
        if($approved)
            $time = Carbon::now();
        $this->approved = $approved;
        $this->approved_at = $time;
    }
}
