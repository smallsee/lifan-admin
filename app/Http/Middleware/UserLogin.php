<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
class UserLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
      $username = $request->session()->get('username');

//      if (!$username){
//        return redirect('/login');
//      }


      return $next($request);
    }
}
