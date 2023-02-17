<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class authBuyer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
      
        if (Auth::guard('buyer')->user())
        {
          /*  return "asd";
            return Auth::user();*/
         //   return redirect('Partner/vendor_home');
             return $next($request);
        }
        else
        {
            return redirect('Buyer/buyer_login');
        }


    }
}
