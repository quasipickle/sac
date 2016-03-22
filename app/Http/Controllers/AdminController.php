<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Presentation;
use App\Course;
use App\User;
use App\Term;
use App\Schedule;

class AdminController extends Controller
{
    public function __construct(){
      $this->middleware('admin');
    }

    public function view_courses(){
      $courses = Course::all();
      return view('courses.index')->with('courses', $courses);
    }

    public function select_term(){
      $terms = Term::all();
      return view('user.admin.select_term')->with('terms', $terms);
    }

    public function set_term(Request $request){
      $term = $request['term'];
      //admin should select date that term expires maybe
      //or use it to set default for term when schedules are made
      //add term column to presentations table and not display terms for admin
      //unless with the term the admin has selected
      return $request['term'];
    }

}
