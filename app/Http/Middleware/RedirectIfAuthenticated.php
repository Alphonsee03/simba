<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Auth\Middleware\RedirectIfAuthenticated as RedirectIfAuthenticatedMiddleware;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated extends RedirectIfAuthenticatedMiddleware
{

    public function handle(Request $request, Closure $next, string ...$guards): Response | JsonResponse
    {
        if(Auth::guard('admin')->check()){
            return redirect(route('admin.dashboard.index'));
        }else if(Auth::guard('petugas')->check()){
            return redirect(route('petugas.dashboard.index'));
        }else if(Auth::guard('mahasiswa')->check()){
            return redirect(route('mahasiswa.dashboard.index'));
        }

        return $next($request);
    }
}
