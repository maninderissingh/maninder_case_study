<?php

namespace App\Http\Middleware;
use Response;
use Closure;
use App\UserToken;

class Authapi
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
        
        $user = UserToken::where(['token' =>$request->header('x-token')])->first();
        if(empty($user)){
            return response()->json([
                'status' => 2,
                'message' => 'Unauthorized access'
            ], 200);
        }
        $request->user = $user;
        return $next($request);  
    }
}
