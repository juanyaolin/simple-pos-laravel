<?php

namespace App\Exceptions\Handlers;

use Symfony\Component\HttpFoundation\Response;

enum ApiCodes: int
{
    case UNCAUGHT_EXCEPTION = 99999999;

    public function message(): string
    {
        return match ($this) {
            default => 'Uncaught Exception',
        };
    }

    public function statusCode(): int
    {
        return match ($this) {
            default => Response::HTTP_INTERNAL_SERVER_ERROR,
        };
    }
}
