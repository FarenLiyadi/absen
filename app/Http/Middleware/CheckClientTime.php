<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckClientTime
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Get the current date and time
        $currentDateTime = date('Y-m-d H:i:s'); // Format: YYYY-MM-DD HH:MM:SS

        // You can add the date and time to the request headers
        $request->headers->set('X-DateTime-Client', $currentDateTime);

        // Alternatively, you can add it to the request object
        $request->attributes->set('datetime_client', $currentDateTime);

        return $next($request);
    }
}
