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

use HyperfExtension\Jwt\Claims\Collection;

interface PayloadValidatorInterface
{
    /**
     * Perform some checks on the value.
     * @throws \HyperfExtension\Jwt\Exceptions\TokenInvalidException
     * @throws \HyperfExtension\Jwt\Exceptions\TokenExpiredException
     */
    public function check(Collection $value, bool $ignoreExpired = false): Collection;

    /**
     * Helper function to return a boolean.
     */
    public function isValid(Collection $value, bool $ignoreExpired = false): bool;
}
