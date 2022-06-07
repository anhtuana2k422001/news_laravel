<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckPermission
{
    public function handle(Request $request, Closure $next)
    {
     
        // Nếu là quản trị viện thì được cho phép tất cả mọi quyền
        if(auth()->user()->role->name === 'admin')
            return $next($request);
        // 1. Lấy tên điều hướng 
        $route_name = $request->route()->getName();

        // 2. Xác thực người nhận quyền của mình
        $route_arr = auth()->user()->role->permissions->toArray();

        // 3. Kiểm tra tài khoản cho sự cho phép không
        foreach($route_arr as $route)
        {
            // 4. Nếu là một trong những sự cho phép
            if($route['name'] ==  $route_name )
                // 5. chấp nhận 
                return $next($request);
        }
        // 6. Nếu không cho phép thì thông báo lỗi 403 
        abort(403, 'Access Denied' | 'UnAuthorized');


    }
}
