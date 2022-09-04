<?php

declare(strict_types=1);
/**
 * This file is part of hyperf-extension/jwt
 *
 * @link     https://github.com/hyperf-extension/jwt
 * @contact  admin@ilover.me
 * @license  https://github.com/hyperf-extension/jwt/blob/master/LICENSE
 */
namespace HyperfExtension\Jwt\Contracts\RequestParser;

use Psr\Http\Message\ServerRequestInterface;

interface HandlerInterface
{
    /**
     * Parse the request.
     *
     * @param \Hyperf\HttpServer\Request|\Psr\Http\Message\ServerRequestInterface $request
     */
    public function parse(ServerRequestInterface $request): ?string;
}
