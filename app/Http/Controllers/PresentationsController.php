<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;

class PresentationsController extends Controller
{
    public function create(Request $request){
    	return view('presentations.create');
    }
}
