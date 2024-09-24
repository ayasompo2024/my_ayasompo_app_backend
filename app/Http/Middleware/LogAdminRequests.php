<?php

namespace App\Http\Middleware;

use App\Models\LogAdminRequest as LogAdminRequestModel;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogAdminRequests
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->is('admin*')) {
            $user = Auth::user();
            $requestData = $request->except('_token', '_method');
            LogAdminRequestModel::create([
                'user_id' => $user->id,
                'ip' => $request->ip(),
                'url' => $request->getRequestUri(),
                'method' => $request->getMethod(),
                'req_data' => json_encode($requestData),
            ]);
        }

        return $next($request);
    }
}
