<?php

declare(strict_types=1);
/**
 * This file is part of hyperf-extension/jwt
 *
 * @link     https://github.com/hyperf-extension/jwt
 * @contact  admin@ilover.me
 * @license  https://github.com/hyperf-extension/jwt/blob/master/LICENSE
 */
namespace HyperfExtension\Jwt\RequestParser;

use HyperfExtension\Jwt\RequestParser\Handlers\AuthHeaders;
use HyperfExtension\Jwt\RequestParser\Handlers\Cookies;
use HyperfExtension\Jwt\RequestParser\Handlers\InputSource;
use HyperfExtension\Jwt\RequestParser\Handlers\QueryString;
use HyperfExtension\Jwt\RequestParser\Handlers\RouteParams;

class RequestParserFactory
{
    public function __invoke()
    {
        return make(RequestParser::class)->setHandlers([
            new AuthHeaders(),
            new QueryString(),
            new InputSource(),
            new RouteParams(),
            new Cookies(),
        ]);
    }
}
