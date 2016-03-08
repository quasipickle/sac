<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Room;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class RoomsController extends Controller
{
    public function index(){
      $rooms = Room::all();
      return view('rooms.index')->with('rooms', $rooms);
    }
    public function create(){
      return view('rooms.create');
    }

    public function store(Request $request){
       Room::create($request->all());
       flash()->success('Room created!');
       return redirect(route('room.index'));
    }

    public function destroy($id)
    {
        $room = Room::findOrFail($id);
        //$this->authorize('modify', $room);

        $room->delete();
        //flash()->success("Room deleted!");

        return redirect()->route('show_rooms');
    }

    public function changeAvaliability($id)
    {
      // $room = Room::findOrFail($id);
      print('got to this point');
    }
}
