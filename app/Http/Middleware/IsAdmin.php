<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class IsAdmin
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
        if ( ! Auth::guard('admin')->check()){
            return redirect()->guest(route('login'))->with('error', trans('app.unauthorized_access'));
        }

        $user = auth()->guard('admin')->user();
     
        if ( ! $user->is_admin())
            return redirect(url('admin/app'))->with('error', trans('app.access_restricted'));

        return $next($request);
    }
}
