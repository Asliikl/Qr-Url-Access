<?php

namespace App\Http\Middleware;

use App\Repositories\AdminRepository;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminNotLoggedMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if((new AdminRepository())->isLogged()){
            return redirect()->route('admin.home');
        }
        return $next($request);
    }
}
