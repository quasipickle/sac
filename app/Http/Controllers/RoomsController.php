<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\Room;

class RoomsController extends Controller
{
    public function show(){
      return view('dashboard.rooms');
    }

    public function add(){

      return view('dashboard.addRooms');
    }

    public function create(){
      $room= new Room();
      $room->room_id= $room_id;
      $room->save();
      return show();
    }
}
