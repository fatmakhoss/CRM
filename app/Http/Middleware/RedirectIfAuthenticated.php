<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    //@param  \Illuminate\Http\Request  $request
    //* @param  \Closure  $next
    //* @param  string|null  $guard
   // * @return mixed
   // */
   public function handle($request, Closure $next, $guard = null){

        return $next($request);

}
}
