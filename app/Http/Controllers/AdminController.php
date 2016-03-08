<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Presentation;
use App\Course;
use App\User;

class AdminController extends Controller
{
    public function __construct(){
      $this->middleware('admin');
    }

    public function base(){
      return view('dashboard.adminbase');
    }

    public function home(){
      return view('dashboard.adminhome');
    }



    public function view_courses(){
      $courses = Course::all();
      return view('dashboard.courses')->with('courses', $courses);
    }

    public function show_requests(){
      $users = User::where('request_new_role', true)->get();
      return view('dashboard.requests')->with('users', $users);
    }

    public function approve_request($id){
      $user=User::findOrFail($id);
      $user->make_professor();
      $user->request_new_role = false;
      $user->save();
      flash()->success($user->name . " now has professor status.");
      return redirect()->route('requests');
    }

    public function decline_request($id){
      $user = User::findOrFail($id);
      $user->request_new_role = false;
      $user->save();
      flash()->success($user->name . " has been denied professor status.");
      return redirect()->route('requests');
    }

}
