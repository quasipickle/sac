<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'username'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function presentations(){
        return $this->hasMany("App\Presentation", "owner");
    }

    public function is_student(){
        return $this->role == 'student';
    }

    public function is_professor(){
        return $this->role == 'professor';
    }

    public function is_admin(){
        return $this->role == 'admin';
    }
}
