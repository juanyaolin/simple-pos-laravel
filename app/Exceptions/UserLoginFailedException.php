<?php

namespace App\Exceptions;

use App\Exceptions\Handlers\ApiCodes;

class UserLoginFailedException extends Exception
{
    protected function apiCode(): ApiCodes
    {
        return ApiCodes::USER_LOGIN_FAILED;
    }
}
