<?php

namespace App\Http\Middleware;

use App\Models\User;
use App\Policies\UserPolicy;
use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{

    public function handle(Request $request, Closure $next, $guard = null)
    {
        if(Auth::guard($guard)->user()->can(UserPolicy::ADMIN, User::class)) {
            return $next($request);
        }
        throw new \HttpException(403, 'Forbidden');
    }
}
