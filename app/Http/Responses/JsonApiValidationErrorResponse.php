<?php

declare(strict_types=1);

namespace App\Http\Responses;

use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

/**
 * Description of JsonApiValidationErrorResponse
 *
 * @author randion
 */
class JsonApiValidationErrorResponse extends JsonResponse {

    public function __construct(ValidationException $exception) {
        $title = $exception->getMessage();

        $data = [
            'errors' => collect($exception->errors())
                    ->map(function ($messages, $field) use ($title) {
                        return [
                    'title' => $title,
                    'detail' => $messages,
                    'source' => [
                        'pointer' => "/" . str_replace('.', '/', $field)
                    ]
                        ];
                    })->values()
        ];

        $headers = [
            'Content-Type' => 'application/vnd.api+json'
        ];

        parent::__construct($data, 422, $headers);
    }

}
