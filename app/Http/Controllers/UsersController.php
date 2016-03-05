<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\PresentationType;
use App\Presentation;

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
        if($id == $user->id){
            if(!$user->is_student()){
                $presentations = Presentation::all()->toArray();
            }else{
                $presentations = $user->presentations()->
                    orderBy('updated_at','desc')->get()->toArray();
            }
            $presentation_types = PresentationType::all()->toArray();
            array_unshift($presentation_types, ''); // Add one value to make the id match the position in the array
            return view('user.show', compact('presentations', 'presentation_types'));
        } else {
            flash()->error('You are not allowed to see others profiles!');
            return redirect(route('user.show', $user->id));
        }

    }

    public function my_courses(){
        $courses = \App\Course::orderBy('subject_code', 'asc')->get();
        return view('user.my_courses', compact('courses'));
    }

    public function add_course(Request $request){
        $user = Auth::user();
        $user->courses()->attach($request['course_id']);
        $user->save();
        return redirect(route('my_courses'));
    }

    public function request_new_role(){
        $user = Auth::user();
        if($user->is_student()){
            $user->requested_new_role = true;
            $user->save();
            flash("Request has been sent! Wait for administratror's approval");
        }
        return redirect(route('user.show', $user->id));
    }

}
