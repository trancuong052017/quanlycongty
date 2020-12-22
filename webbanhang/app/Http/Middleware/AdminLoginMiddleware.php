<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;

class AdminLoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {   if(Auth::check())
      { 
        $user = Auth::user();
        //dd($user);
        if($user->quyen == 1)
        {
        return $next($request);
        }
        else {
         return redirect('/trangchu');}
      }
    else
        return redirect('admin/dangnhap');
        
    } 
}

