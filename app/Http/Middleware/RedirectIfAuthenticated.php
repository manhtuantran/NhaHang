<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @param string|null $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
//            return redirect(RouteServiceProvider::HOME);

            return $next($request);

        } else {
            return redirect('admin/dangnhap')->with('thongbao', 'Sai thông tin tài khoản hoặc tài khoản của bạn đã bị người quản trị khóa');
        }
    }
}
