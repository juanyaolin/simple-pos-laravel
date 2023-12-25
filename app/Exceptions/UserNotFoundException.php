<?php

namespace App\Exceptions;

use App\Exceptions\Handlers\ApiCodes;

class UserNotFoundException extends Exception
{
    protected function apiCode(): ApiCodes
    {
        return ApiCodes::USER_NOT_FOUND;
    }
}
