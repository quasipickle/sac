<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class accessAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user=Auth::user();
        if($user->is_admin()){
          return $next($request);
        }
        else{
          flash()->error("You are not allowed to access admin routes.");
          return redirect()->route('home');
        }

    }
}
