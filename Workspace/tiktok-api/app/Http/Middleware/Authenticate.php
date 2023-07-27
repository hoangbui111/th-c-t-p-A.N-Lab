<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle($request, Closure $next, ...$guards)
    {
        if (!Auth::check()) { // Nếu người dùng chưa đăng nhập
            return redirect()->route('login')->with('error', 'Vui lòng đăng nhập để truy cập vào trang "Main".');
        }
        $user = Auth::user();
        return $next($request);
    }
}
