<?php

namespace App\Traits;

use MarcinOrlowski\ResponseBuilder\ResponseBuilder;
use Symfony\Component\HttpFoundation\Response;

trait HasApiResponseMethods
{
    /**
     * Returns success.
     *
     * @param mixed|null $data         array of primitives and supported objects to be returned in
     *                                 'data' node of the JSON response, single supported object
     *                                 or @null if there's no to be returned
     * @param int|null   $apiCode      API code to be returned or @null to use value of
     *                                 BaseApiCodes::OK()
     * @param array|null $placeholders placeholders passed to Lang::get() for message placeholders
     *                                 substitution or @null if none
     * @param int|null   $httpCode     HTTP code to be used for HttpResponse sent or @null
     *                                 for default DEFAULT_HTTP_CODE_OK
     * @param int|null   $jsonOptions  See http://php.net/manual/en/function.json-encode.php for
     *                                 supported options or pass @null to use value from your
     *                                 config (or defaults).
     *
     * @throws Ex\MissingConfigurationKeyException
     * @throws Ex\ConfigurationNotFoundException
     * @throws Ex\IncompatibleTypeException
     * @throws Ex\ArrayWithMixedKeysException
     * @throws Ex\InvalidTypeException
     * @throws Ex\NotIntegerException
     */
    public function success(
        $data = null,
        int $apiCode = null,
        array $placeholders = null,
        int $httpCode = null,
        int $jsonOptions = null
    ): Response {
        return ResponseBuilder::success(
            $data,
            $apiCode,
            $placeholders,
            $httpCode,
            $jsonOptions
        );
    }

    /**
     * Builds error Response object. Supports optional arguments passed to Lang::get() if associated error
     * message uses placeholders as well as return data payload.
     *
     * @param int               $apiCode      your API code to be returned with the response object
     * @param array|null        $placeholders placeholders passed to Lang::get() for message
     *                                        placeholders substitution or @null if none
     * @param object|array|null $data         array of primitives and supported objects to be
     *                                        returned in 'data' node of the JSON response, single
     *                                        supported object or @null if there's no to be returned
     * @param int|null          $httpCode     HTTP code to be used for HttpResponse sent or @null
     *                                        for default DEFAULT_HTTP_CODE_ERROR
     * @param int|null          $jsonOptions  See http://php.net/manual/en/function.json-encode.php
     *                                        for supported options or pass @null to use value from
     *                                        your config (or defaults).
     *
     * @throws Ex\ArrayWithMixedKeysException
     * @throws Ex\MissingConfigurationKeyException
     * @throws Ex\ConfigurationNotFoundException
     * @throws Ex\IncompatibleTypeException
     * @throws Ex\InvalidTypeException
     * @throws Ex\NotIntegerException
     */
    public static function error(
        int $apiCode,
        array $placeholders = null,
        $data = null,
        int $httpCode = null,
        int $jsonOptions = null
    ): Response {
        return ResponseBuilder::error(
            $apiCode,
            $placeholders,
            $data,
            $httpCode,
            $jsonOptions
        );
    }
}
