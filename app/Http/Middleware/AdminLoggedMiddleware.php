<?php

namespace App\Http\Middleware;

use App\Repositories\AdminRepository;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminLoggedMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $adminRepository = new AdminRepository();
        if(!$adminRepository->isLogged()){
            $adminRepository->logout();
            return redirect()->route('admin.login');
        }
        $adminCheck = $adminRepository->get(['hashed_id'=> session()->get('admin')->hashed_id])->first();
        if(!$adminCheck){
            $adminRepository->logout();
            return redirect()->route('admin.login');
        }
        $request->merge(['admin' => $adminCheck]);
        return $next($request);
    }
}
