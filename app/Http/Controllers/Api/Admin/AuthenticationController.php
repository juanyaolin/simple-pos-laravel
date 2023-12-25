<?php

namespace App\Http\Controllers\Api\Admin;

use App\Exceptions\UserLoginFailedException;
use App\Http\Controllers\Api\Controller;
use App\Http\Requests\Authentication\LoginRequest;
use App\Http\Resources\Authentication\LoginResource;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthenticationController extends Controller
{
    public function login(LoginRequest $request)
    {
        $attributes = $request->validated();

        /** @var User $user */
        $user = User::where('name', $attributes['name'])->first();

        throw_if(is_null($user), UserLoginFailedException::class);

        throw_if(
            !Hash::check($attributes['password'], $user->password),
            UserLoginFailedException::class
        );

        $user->tokens()->delete();

        $token = $user->createToken('token')->plainTextToken;

        return $this->success(LoginResource::make($user, $token));
    }

    public function logout()
    {
        auth()->user()->currentAccessToken()->delete();

        return $this->success();
    }
}
