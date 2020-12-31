<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Illuminate\Support\Facades\Auth;

class IsEmailVerified
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
        $user = User::where('email',$request->email)->first();
        if(!is_null($user->email_verified_at)){
            return $next($request);
        }

        $response = [
            "response_code" => "01",
            "response_message" => "user not verified"
        ];

        return response($response, 401)
            ->header('Content-Type', 'text/json');
    }
}
