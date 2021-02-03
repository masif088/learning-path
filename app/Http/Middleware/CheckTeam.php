<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckTeam
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @param array $roles
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        foreach ($roles as $role) {
            if ($request->user()->hasTeamRole($request->user()->currentTeam, $role)) {
                return $next($request);
            }
        }
        return redirect(route('admin.dashboard'));
    }
}
