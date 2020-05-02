<?php
/**
 * Created by PhpStorm.
 * User: Victor
 * Date: 2019-02-17
 * Time: 20:57
 */

namespace App\Http\Middleware;

use Closure;

class JsonMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $request->headers->set('Accept','application/json');

        $response = $next($request);

        // Force response headers to JSON
        $response->withHeaders([
            'Content-Type' => 'application/json'
        ]);

        $method = strtolower($request->getMethod());
        $mediaType = $request->header('Content-Type');

        if (in_array($method, array('post', 'put', 'patch')) && '' !== $request->getContent()) {
            if (empty($mediaType) || $mediaType !== 'application/json') {
                $response = $response->setStatusCode(415);
            }
        }

        return $response;
    }
}
