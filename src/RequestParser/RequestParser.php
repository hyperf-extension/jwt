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

use HyperfExtension\Jwt\Contracts\RequestParser\RequestParserInterface;
use Psr\Http\Message\ServerRequestInterface;

class RequestParser implements RequestParserInterface
{
    /**
     * @var \HyperfExtension\Jwt\Contracts\RequestParser\HandlerInterface[]
     */
    private $handlers;

    /**
     * @param \HyperfExtension\Jwt\Contracts\RequestParser\HandlerInterface[] $handlers
     */
    public function __construct(array $handlers = [])
    {
        $this->handlers = $handlers;
    }

    public function getHandlers(): array
    {
        return $this->handlers;
    }

    public function setHandlers(array $handlers)
    {
        $this->handlers = $handlers;

        return $this;
    }

    public function parseToken(ServerRequestInterface $request): ?string
    {
        foreach ($this->handlers as $handler) {
            if ($token = $handler->parse($request)) {
                return $token;
            }
        }
        return null;
    }

    public function hasToken(ServerRequestInterface $request): bool
    {
        return $this->parseToken($request) !== null;
    }
}
