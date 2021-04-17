<?php

namespace App\Http\Middleware;

use Closure;
use JWTAuth;
use Exception;
use App\Helpers\Response as R;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;

class JwtMiddleware extends BaseMiddleware
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

        try {
            $user = JWTAuth::parseToken()->authenticate();
        } catch (Exception $e) {
            if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException){
                return R::SimpleError(['msg' => 'Token is Invalid']);
            }else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException){
                return R::SimpleError(['msg' => 'Token is Expired']);
            }else{
                return R::SimpleError(['msg' => 'Authorization Token not found']);
            }
        }
        return $next($request);
    }
}
