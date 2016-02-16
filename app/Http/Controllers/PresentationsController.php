<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\Course;
use App\PresentationType;

class PresentationsController extends Controller
{
    public function create(Request $request){
        $courses = Course::all();
        $presentation_types = PresentationType::all();
        return view('presentations.create', compact('courses', 'presentation_types'));
    }
}
