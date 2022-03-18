<?php

namespace App\Http\Middleware;

use App\Enums\RoleEnum;
use Closure;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, string $role)
    {
        if ($role === 'admin' && $request->user()->role_id === RoleEnum::Admin->value)
            return $next($request);

        if ($role === 'dosen' && $request->user()->role_id === RoleEnum::Dosen->value)
            return $next($request);

        if ($role === 'mahasiswa' && $request->user()->role_id === RoleEnum::Mahasiswa->value)
            return $next($request);

        return throw new AuthorizationException();
    }
}
