<?php

namespace App\Http\Middleware;

use Closure;

class BlogMiddleware {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        $response= $next($request);
        /* add Allowed Domain */
        $allowedDomains = array("http://localhost:8100");
        $origin = $request->server('HTTP_ORIGIN');
        if (in_array($origin, $allowedDomains)) {
            //Intercepts OPTIONS requests
            if ($request->isMethod('OPTIONS')) {
                $response = response('', 200);
            } else {
                // Pass the request to the next middleware
                $response = $next($request);
            }
            // Adds headers to the response
        }
        $response->header('Access-Control-Allow-Origin', '*');
        $response->header('Access-Control-Allow-Methods', 'OPTIONS, GET, POST, PUT, PATCH, DELETE');
        $response->header('Access-Control-Allow-Headers', $request->header('Access-Control-Request-Headers'));
        return $response;
    }

}
