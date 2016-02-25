<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Room;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class RoomsController extends Controller
{
    public function show(){
      return view('dashboard.room');
    }
    public function create(){
      return view('dashboard.addRoom');
    }

    public function store(){
      $room = new App\Room();
      $room->code = $code;
      $room->description = $description;
      $room->save();
      return view('dashboard.room');
    }
}
