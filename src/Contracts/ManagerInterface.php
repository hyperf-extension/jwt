<?php

declare(strict_types=1);
/**
 * This file is part of hyperf-extension/jwt
 *
 * @link     https://github.com/hyperf-extension/jwt
 * @contact  admin@ilover.me
 * @license  https://github.com/hyperf-extension/jwt/blob/master/LICENSE
 */
namespace HyperfExtension\Jwt\Contracts;

use HyperfExtension\Jwt\Blacklist;
use HyperfExtension\Jwt\Payload;
use HyperfExtension\Jwt\Token;

interface ManagerInterface
{
    /**
     * Encode a Payload and return the Token.
     */
    public function encode(Payload $payload): Token;

    /**
     * Decode a Token and return the Payload.
     *
     * @throws \HyperfExtension\Jwt\Exceptions\TokenBlacklistedException
     */
    public function decode(Token $token, bool $checkBlacklist = true): Payload;

    /**
     * Refresh a Token and return a new Token.
     *
     * @throws \HyperfExtension\Jwt\Exceptions\TokenBlacklistedException
     * @throws \HyperfExtension\Jwt\Exceptions\JwtException
     */
    public function refresh(Token $token, bool $forceForever = false): Token;

    /**
     * Invalidate a Token by adding it to the blacklist.
     *
     * @throws \HyperfExtension\Jwt\Exceptions\JwtException
     */
    public function invalidate(Token $token, bool $forceForever = false): bool;
}
