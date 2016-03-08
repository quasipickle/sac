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
            $presentations = $user->presentations()->
            orderBy('updated_at','desc')->get()->toArray();
            $presentation_types = PresentationType::all()->toArray();
            array_unshift($presentation_types, ''); // Add one value to make the id match the position in the array
            if($user->is_admin()){
              return view('dashboard.adminbase');
            }
            return view('user.show', compact('presentations', 'presentation_types'));
        }
        else {
            flash()->error('You are not allowed to see others profiles!');
            return redirect(route('user.show', $user->id));
        }

    }

    public function my_courses(){
        $courses = \App\Course::orderBy('subject_code', 'asc')->
            orderBy('number')->get();
        return view('user.professor.my_courses', compact('courses'));
    }

    public function add_course(Request $request){
        $user = Auth::user();
        $this->authorize('add_course', $user);

        try{
            $user->courses()->attach($request['course_id']);
            $user->save();
            flash()->success('Course added to your account!');
        } catch(\Illuminate\Database\QueryException $e){
            flash()->error('You already have this course');
        }

        return redirect(route('my_courses'));
    }

    public function remove_course($id){
        $user = Auth::user();
        $this->authorize('remove_course', $user);

        try{
            $user->courses()->detach($id);
            $user->save();
            flash()->success('Course removed from your account!');
        } catch(\Illuminate\Database\QueryException $e){
            flash()->error("You don't have this course");
        }

        return redirect(route('my_courses'));
    }

    public function request_new_role(){
        $user = Auth::user();
        $this->authorize('request_new_role', $user);

        $user->requested_new_role = true;
        $user->save();
        flash("Request has been sent! Wait for administratror's approval");
        return redirect(route('user.show', $user->id));
    }

}
