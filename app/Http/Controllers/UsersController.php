<?php

namespace App\Http\Controllers;
use App\User;
use Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;


class UsersController extends Controller
{
    public function create(){
        return view('users.signUp');
    }

    public function store(){

      $input = Request::all();
      print_r($input);
      User::create($input);
      return "done";
    }
}
