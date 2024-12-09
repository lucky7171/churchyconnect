<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth; // Import the Auth facade

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::user()->usertype != 'admin') {
            
            //send user to homepage if not admin, cant access on the address bar, use the below route from web.php to redirect user
            return redirect('home');
        }

        //if admin send to the admin dashboard
        return $next($request);
    }
}
