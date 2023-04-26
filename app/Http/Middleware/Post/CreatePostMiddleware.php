<?php

namespace App\Http\Middleware\Post;

use Closure;
use Illuminate\Http\Request;

class CreatePostMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(auth()->user() == null)
        {
            return redirect()->route('site.index');
        }

        return $next($request);
    }
}
