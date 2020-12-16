<?php

namespace App\Http\Middleware;

use App\Model\Token;
use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            $token = Token::where('user_id', Auth::id())->orderByDesc('created_at')->first();

            if (! $token->isValid()) {
                return redirect(RouteServiceProvider::HOME);
            }

            return redirect('/code');
        }
            
        return $next($request);
    }
}
