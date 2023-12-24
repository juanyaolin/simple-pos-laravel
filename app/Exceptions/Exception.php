<?php

namespace App\Exceptions;

use App\Exceptions\Handlers\ApiCodes;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;
use Throwable;

class Exception extends \Exception implements HttpExceptionInterface
{
    protected mixed $data = null;

    public function __construct(
        string $message = null,
        int $code = 0,
        Throwable $previous = null
    ) {
        parent::__construct(
            $message ?? $this->apiCode()->message(),
            $code,
            $previous
        );
    }

    public function getApiCode(): int
    {
        return $this->apiCode()->value;
    }

    public function getData(): mixed
    {
        return $this->data;
    }

    public function getStatusCode(): int
    {
        return $this->apiCode()->statusCode();
    }

    public function getHeaders(): array
    {
        return [];
    }

    protected function apiCode(): ApiCodes
    {
        return ApiCodes::UNCAUGHT_EXCEPTION;
    }
}
