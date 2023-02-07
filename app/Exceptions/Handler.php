<?php

declare(strict_types=1);

namespace App\Exceptions;

use App\Http\Responses\JsonApiValidationErrorResponse;
use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class Handler extends ExceptionHandler {

    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
            //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register() {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    /**
     * Report or log an exception.
     *
     * @param  \Throwable  $exception
     * @return void
     *
     * @throws Exception
     */
    public function report(Throwable $exception) {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  Request  $request
     * @param  \Throwable  $exception
     * @return Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception) {
        return parent::render($request, $exception);
    }

//    protected function invalidJson($request, ValidationException $exception): JsonResponse {
//        $errors = [];
//
//        foreach ($exception->errors() as $field => $message) {
//            $pointer = "/" . str_replace('.', '/', $field);
//            $errors [] = [
//                'title' => $field,
//                'detail' => $message,
//                'source' => [
//                    'pointer' => $pointer
//                ]
//            ];
//        }
//
//        $errors = ['errors' => $errors];
//
//        if (!$request->routeIs('api.v1.login')) {
//            return response()->json($errors);
//        }
//
//        return parent::invalidJson($request, $exception);
//    }

    function invalidJson($request, ValidationException $exception): JsonApiValidationErrorResponse
    {
//        dd($exception->errors());
        return new JsonApiValidationErrorResponse($exception);
    }

}
