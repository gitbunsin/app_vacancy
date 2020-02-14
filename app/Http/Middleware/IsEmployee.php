<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class IsEmployee
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
        if ( ! Auth::guard('employee')->check()){
            return redirect()->guest(route('login'))->with('error', trans('app.unauthorized_access'));
        }

        $user = auth()->guard('employee')->user();
     
        if ( ! $user->is_employee()){
            $request->session()->put('KEY', 'VALUE');
            // Config::set('session.driver', 'array');
            return redirect(url('admin/employee'))->with('error', trans('app.access_restricted'));

        }

        return $next($request);
    }
}
