<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class requestNewRoleController extends Controller
{

  // public function __construct(){
  //     $this->middleware('auth');
  // }

  public function request($id)
  {
      $requestNewRole = requestNewRole::findOrFail($id);
          $requestNewRole->user_id = Auth::id();
          $requestNewRole->save();
      return 'Done';
  }
}
