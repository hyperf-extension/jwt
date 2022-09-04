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

interface RequestParserInterface
{
    /**
     * Get the parser chain.
     *
     * @return \HyperfExtension\Jwt\Contracts\RequestParser\HandlerInterface[]
     */
    public function getHandlers(): array;

    /**
     * Set the order of the parser chain.
     *
     * @param \HyperfExtension\Jwt\Contracts\RequestParser\HandlerInterface[] $handlers
     *
     * @return $this
     */
    public function setHandlers(array $handlers);

    /**
     * Iterate through the parsers and attempt to retrieve
     * a value, otherwise return null.
     */
    public function parseToken(ServerRequestInterface $request): ?string;

    /**
     * Check whether a token exists in the chain.
     */
    public function hasToken(ServerRequestInterface $request): bool;
}
