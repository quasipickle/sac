<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\Course;

class PresentationsController extends Controller
{
    public function create(Request $request){
    	$courses = Course::all();
    	// print_r($courses);
    	return view('presentations.create', compact('courses'));
    }
}
