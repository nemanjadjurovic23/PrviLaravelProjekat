<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminCheckMiddleware
{

    public function handle(Request $request, Closure $next): Response
    {
        $role = Auth::user()->role;

        if ($role != "admin") {
            return redirect("/");
        }

        return $next($request);
    }
}
