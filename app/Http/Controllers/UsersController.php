<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\PresentationType;

class UsersController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Auth::user();
        if($id == Auth::user()->id){
            $presentations = $user->presentations()->
                orderBy('updated_at','desc')->get()->toArray();
            $presentation_types = PresentationType::all()->toArray();
            array_unshift($presentation_types, ''); // Add one value to make the id match the position in the array
            return view('user.show', compact('presentations', 'presentation_types'));
        } else {
            return redirect()->route('home')->
                with('message', 'You are not allowed to see others profiles');
        }

    }

}
