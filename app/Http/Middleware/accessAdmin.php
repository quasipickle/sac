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
          return redirect()->route('home'); //have to add index.php to the url
        }

    }
}
