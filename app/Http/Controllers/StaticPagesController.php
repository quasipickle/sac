<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class StaticPagesController extends Controller
{
    public function home(){
        if(Auth::check())
            return redirect()->route('user.show', Auth::user());
        return view('static.home');
    }
}
