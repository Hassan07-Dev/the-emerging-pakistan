<?php

namespace App\Http\Middleware;

use App\HelpersFunction\Constants;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class isBlocked
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
        if(Auth::user()->is_blocked == Constants::BLOCKED_USER ){
            Auth::logout();
            return redirect()->route('user.login')->with('error','Your account has beend blocked');
        }
        return $next($request);
    }
}
