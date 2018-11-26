<?php

namespace App\Http\Middleware;

use Closure;

class CheckIfEmailVerified
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!$request->user()->email_verified) {
            return back()->with('email_verified', email_facilitator());
        }
        // 如果是 AJAX 请求，则通过 JSON 返回
        if ($request->expectsJson()) {
            return response()->json(['msg' => '您账号还没有验证邮箱进行激活喔!'], 400);
        }

        return $next($request);
    }
}
