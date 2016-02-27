<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Presentation;

class AdminController extends Controller
{
    public function base(){
      return view('dashboard.adminbase');
    }

    public function home(){
      return view('dashboard.adminhome');
    }

    public function view_presentations(){
      $presentations = Presentation::all();
      return view('dashboard.presentations')->with('presentations', $presentations);
    }
}
