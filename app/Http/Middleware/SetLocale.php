<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    public function handle(Request $request, Closure $next): Response
    {
        $locale = $request->query('locale', $request->header('Accept-Language', 'en'));

        // Take only the first 2 chars (e.g. "en-US" -> "en")
        $locale = substr($locale, 0, 2);

        if (in_array($locale, ['en', 'id'])) {
            app()->setLocale($locale);
        }

        return $next($request);
    }
}
