<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;

class CheckUser
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user() != null) {
            $username = explode('/', strip_tags($request->getRequestUri()));
            $username = $username[2];
            if (auth()->user()->login === $username) {
                return $next($request);
            } else {
                return redirect()->back();
            }
        } else {
            return redirect(RouteServiceProvider::LOGIN);
        }
    }
}
