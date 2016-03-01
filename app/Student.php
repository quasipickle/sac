<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Student extends User{
    public function is_student(){
        return true;
    }
}
