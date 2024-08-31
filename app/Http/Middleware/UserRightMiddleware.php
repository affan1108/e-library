<?php

namespace App\Http\Middleware;

use App\Repositories\UserRight;

use Closure;

class UserRightMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $userId = \Auth::user()->id;
        $hasRight = UserRight::hasRight($userId, UserRight::PORTAL_APP_ID);
        if (!$hasRight['success']) {
            return redirect(route('homepage'))
                ->with('alert-class', 'alert-danger')
                ->with('message', $hasRight['message']);
        }
        
        return $next($request);
    }
}
