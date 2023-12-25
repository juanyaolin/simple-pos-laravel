<?php

namespace App\Http\Resources\Authentication;

use App\Http\Resources\User\UserResource;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

class LoginResource extends UserResource
{
    public function __construct(User $user, protected string $token)
    {
        parent::__construct($user);
    }

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return parent::toArray($request) + [
            'token' => $this->token,
        ];
    }
}
