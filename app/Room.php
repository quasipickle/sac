<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    public $incrementing = false;
    protected $primaryKey = 'code';
    protected $fillable = ['code', 'description', 'building'];
}
