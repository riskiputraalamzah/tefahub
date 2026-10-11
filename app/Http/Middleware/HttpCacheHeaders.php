<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Add HTTP cache-control headers to responses to allow browser & proxy caching.
 *
 * – API endpoints that use server-side Cache::remember get a short max-age
 *   so browsers do not hammer the server with repeated requests.
 * – Static asset routes (welcome, profil, bkk, etc.) can be cached longer.
 * – POST/PATCH/PUT/DELETE always get no-store to prevent stale writes.
 */
class HttpCacheHeaders
{
    public function handle(Request $request, Closure $next): Response
    {
        /** @var Response $response */
        $response = $next($request);

        // Never cache mutating requests
        if (! $request->isMethod('GET')) {
            $response->headers->set('Cache-Control', 'no-store, no-cache, must-revalidate');

            return $response;
        }

        // Public landing pages — can be cached by browser & CDN for 5 minutes
        $publicRoutes = ['home', 'bkk', 'profil', 'pkl', 'ppdb', 'ppdb.daftar', 'ppdb.kuis', 'kuis-jurusan'];
        if (in_array($request->route()?->getName(), $publicRoutes, true)) {
            $response->headers->set('Cache-Control', 'public, max-age=300, stale-while-revalidate=60');

            return $response;
        }

        // Siswa API endpoints — short cache consistent with server-side TTL
        if ($request->is('siswa/api/*')) {
            $response->headers->set('Cache-Control', 'private, max-age=30, must-revalidate');

            return $response;
        }

        // Admin monitor metrics — very short cache
        if ($request->is('admin/monitor/metrics')) {
            $response->headers->set('Cache-Control', 'private, max-age=10, must-revalidate');

            return $response;
        }

        // All other authenticated pages — no caching
        $response->headers->set('Cache-Control', 'no-store, private');

        return $response;
    }
}
