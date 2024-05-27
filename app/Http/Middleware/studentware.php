<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class studentware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $studentlogincheck=$request->session()->get('std_email');
        if($studentlogincheck=='')
        {
            return redirect('/');
        }
        else
        {
            return $next($request);
        }
    }
}
