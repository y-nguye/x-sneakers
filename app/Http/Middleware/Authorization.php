<?php

namespace App\Http\Middleware;

// use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Closure;

class Authorization
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    public function handle(Request $request, Closure $next)
    {
        // Kiểm tra quyền truy cập sử dụng Gate
        if (Gate::allows('access-authorization')) {
            // Thực hiện việc chuyển yêu cầu tới middleware Kernel.php
            $response = $next($request);
            return $response;
        }

        // Nếu không có quyền, có thể chuyển hướng hoặc xử lý khác
        abort(403, 'Unauthorized');
        // return redirect('user');
    }
}
