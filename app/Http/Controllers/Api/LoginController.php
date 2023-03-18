<?php
declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

/**
 * Utiliza Sanctum para crear tokens
 */
class LoginController extends Controller
{

    public function __invoke(Request $request)
    {

        $request->validate([
            'data.attributes.email' => ['required', 'email'],
            'data.attributes.password' => ['required', 'string', 'min:4'],
            'data.attributes.device_name' => ['required', 'string'],
        ]);

        $email = $request->input('data.attributes.email');
        $user = User::whereEmail($email)->first();

        if (!$user || !Hash::check($request->input('data.attributes.password'), $user->password)) {
            throw ValidationException::withMessages([
                'email' => [__('auth.failed')]
            ]);
        }

        $plainTextToken = $user->createToken($request->input('data.attributes.device_name'))->plainTextToken;

        // enviamos al cliente el token en claro, para que se autentifique en sus consultas posteriores
        return response()->json([
            'plainTextToken' => $plainTextToken]);
    }

}
