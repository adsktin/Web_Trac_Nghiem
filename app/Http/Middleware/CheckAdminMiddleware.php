<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;
use Illuminate\Http\Request;


class CheckAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        if (Auth::check()) {
            if (Auth::user()->isAdmin == 1 || Auth::user()->isManager == 1) {
                return $next($request);
            } else {
                return redirect()->route('login')->with('error', 'Email hoặc mật khẩu không chính xác');
            }
        }
        return redirect()->route('login')->with('error', 'Tính hack khi chưa login à, không dễ đâu');
        //abort(404);
    }
}