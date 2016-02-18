<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

use App\Http\Requests;
use App\Http\Controllers\Controller;

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
            $presentations = $user->presentations()
                ->orderBy('updated_at','desc')->get()->toArray();
            return view('user.show', compact('presentations'));
        } else {
            return redirect()->route('home')
                ->with('message', 'You are not allowed to see others profiles');
        }

    }

}
