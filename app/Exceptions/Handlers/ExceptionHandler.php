<?php

namespace App\Exceptions\Handlers;

use App\Exceptions\Exception;
use MarcinOrlowski\ResponseBuilder\BaseApiCodes;
use MarcinOrlowski\ResponseBuilder\Contracts\ExceptionHandlerContract;
use MarcinOrlowski\ResponseBuilder\ResponseBuilder as RB;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class ExceptionHandler implements ExceptionHandlerContract
{
    public function handle(array $user_config, Throwable $ex): ?array
    {
        if ($ex instanceof Exception) {
            return [
                RB::KEY_API_CODE => $ex->getApiCode(),
                RB::KEY_HTTP_CODE => $ex->getStatusCode(),
            ];
        }

        return [
            RB::KEY_API_CODE => BaseApiCodes::EX_HTTP_EXCEPTION(),
            RB::KEY_HTTP_CODE => Response::HTTP_INTERNAL_SERVER_ERROR,
        ];
    }
}
