<?php

namespace App\Exceptions\Handlers;

use Symfony\Component\HttpFoundation\Response;

enum ApiCodes: int
{
    case UNCAUGHT_EXCEPTION = 99999999;

    /** 找不到管理用戶 */
    case USER_NOT_FOUND = 10010001;
    case USER_LOGIN_FAILED = 10010002;

    public function message(): string
    {
        return match ($this) {
            default => 'Uncaught Exception',
            self::USER_NOT_FOUND => '找不到管理用戶',
            self::USER_LOGIN_FAILED => '帳號或密碼輸入錯誤',
        };
    }

    public function statusCode(): int
    {
        return match ($this) {
            default => Response::HTTP_INTERNAL_SERVER_ERROR,
            self::USER_NOT_FOUND => Response::HTTP_NOT_FOUND,
            self::USER_LOGIN_FAILED => Response::HTTP_UNAUTHORIZED,
        };
    }
}
