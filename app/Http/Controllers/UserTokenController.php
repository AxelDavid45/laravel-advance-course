<?php

namespace App\Http\Controllers;


use App\Http\Requests\UserTokenRequest;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserTokenController extends Controller
{
    public function __invoke(UserTokenRequest $request): \Illuminate\Http\JsonResponse
    {
        /** @var User $user */
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            abort(401, 'Wrong information');
        }

        $password = Hash::check($request->password, $user->password);

        if (!$password) {
            abort(401, 'Wrong information');
        }

        return response()->json([
            'token' => $user->createToken($request->device_name)->plainTextToken,
        ]);
    }
}
