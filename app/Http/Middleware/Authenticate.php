<?php

namespace App\Http\Middleware;

use App\Model\Token;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string[]  ...$guards
     * @return mixed
     *
     * @throws \Illuminate\Auth\AuthenticationException
     */
    public function handle($request, $next, ...$guards)
    {
        $this->authenticate($request, $guards);

        $token = Token::where('user_id', Auth::id())->orderByDesc('created_at')->first();

        if ($request->user()->isAdmin) {
            return redirect('admin/dashboard');
        }

        if (! $token->isValid()) {

            return $next($request);
        }

        return redirect('code');
    }

    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('login');
        }
    }
}
