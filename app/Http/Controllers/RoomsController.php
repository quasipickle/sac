<?php

namespace App\Http\Controllers;


//use Illuminate\Http\Request;
use Request;
use App\Room;
use App\Http\Requests;
use App\Http\Controllers\Controller;


class RoomsController extends Controller
{
    public function show(){
      $rooms= Room::all();
      return view('dashboard.room')->with('rooms', $rooms);
    }
    public function create(){
      return view('dashboard.addRoom');
    }

    public function store(){
      // $rooms= Room::all();
       $input = Request::all();
       $room = new Room();
       $room->code = $input['code'];
       $room->description = $input['description'];
       $room->save();
       //return view('dashboard.room')->with('rooms', $rooms);
       return redirect()->route('show_rooms');
    }

    public function destroy($id)
    {
        print("hello");
        $room = Room::findOrFail($id);
        //$this->authorize('modify', $room);

        $room->delete();
        //flash()->success("Room deleted!");

        return redirect()->route('show_rooms');
    }
}
