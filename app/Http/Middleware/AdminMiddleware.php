<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class AdminMiddleware
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
        $user = $request->user();
        if ($user->jabatan_id !== 1) {
            // Auth::logout();
            return redirect('/')
            ->with('alert-class', 'alert-danger')
            ->with('message', 'Anda tidak memiliki otoritas Admin.');
            // abort(403, 'forbidden');
        }
        return $next($request);
    }
}
