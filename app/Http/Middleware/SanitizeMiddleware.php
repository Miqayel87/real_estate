<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Helpers\SanitizeInput;

class SanitizeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse) $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $sanitizer = new SanitizeInput;

        $sanitizedData = $this->sanitizeArrayRecursive($request->all(), $sanitizer);

        $request->replace($sanitizedData);

        return $next($request);
    }

    private function sanitizeArrayRecursive($data, $sanitizer)
    {
        foreach ($data as $key => $value) {
            if (!is_null($value) && is_array($value)) {
                $data[$key] = $this->sanitizeArrayRecursive($value, $sanitizer);
            } else {
                $data[$key] = $sanitizer->passes($value);
            }
        }

        return $data;
    }
}
