<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminCheckMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $role = Auth::user()->role; // ulogovan od moje strane

        if($role != 'admin') // Ako nisi admin - vraca se na '/' - home
        {
            return redirect('/')->with('error', 'Nemate pristup');
        }

        return $next($request); // Nastavi dalje na tu putanju
    }
}
