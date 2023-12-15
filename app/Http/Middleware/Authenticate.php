<?php

namespace App\Http\Middleware;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;


class Authenticate extends Middleware
 {
     /**
        * Get the path the user should be redirected to when they are not authenticated.
        *
        * @param  \Illuminate\Http\Request  $request
        * @return string|null
      */
    protected function redirectTo($request)
     {
        if (!$request->expectsJson()) {
             if(Request::is('admin/*'))
                return route('getlogin');
            else
                return route('login');
           

        }
        // if (!$request->expectsJson()) {
        //     return route('getlogin');
        // }
    }
}
