<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class SuperAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::user()->usertype != 'superadmin') 
        {
            return redirect('/');
        }
        return $next($request);
    }
}