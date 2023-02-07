<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;

class ValidateJsonApiHeaders {

    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next) {
//        dump($request);
        if ($request->header('Accept') !== 'application/vnd.api+json') {
            throw new HttpException(406, __('Not Acceptable'));
        }

        if ($request->isMethod('POST') || $request->isMethod('PATCH')) {
            if ($request->header('content-type') !== 'application/vnd.api+json') {
                throw new HttpException(415, __('Unsupported Media Type'));
            }
        }

        // Añade esta cabecera a todas las respuestas
        return $next($request)
                        ->withHeaders([
                            'content-type' => 'application/vnd.api+json'
        ]);
    }

}
