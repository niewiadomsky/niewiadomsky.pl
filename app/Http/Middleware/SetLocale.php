<?php

namespace App\Http\Middleware;

use App;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $locale = $request->header('Accept-Language', session('locale', 'en'));

        $splitLocale = explode(',', $locale);
        $firstLocale = trim($splitLocale[0]);
        
        if (!in_array($firstLocale, ['en', 'pl'])) {
            $locale = 'en';
        }
        
        session()->put('locale', $firstLocale);
        App::setLocale($firstLocale);
        
        return $next($request);
    }
}
