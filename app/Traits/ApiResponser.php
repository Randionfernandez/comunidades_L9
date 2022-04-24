<?php

declare(strict_types=1);

/**
 * Sugerencia de un tutorial; Eliminar, en un futuro, este trait
 * 
 * https://medium.com/swlh/api-authentication-using-laravel-sanctum-laravel-8-19ed8b4f124c
 * 
 * @author randion
 */
trait ApiResponser {

    function success($data, string $message = null, int $code = 200) {
        return response()->json([
                    'data' => $data,
                    'message' => $message,
                    'status' => 'success'
                        ], $code);
    }

    function error(string $message = null, int $code = 200, $data = null) {
        return response()->json([
                    'data' => $data,
                    'message' => $message,
                    'status' => 'success'
                        ], $code);
    }

}
