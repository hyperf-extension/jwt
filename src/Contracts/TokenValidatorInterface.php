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

interface TokenValidatorInterface extends ValidatorInterface
{
    /**
     * Perform some checks on the value.
     */
    public function check(string $value): string;

    /**
     * Helper function to return a boolean.
     */
    public function isValid(string $value): bool;
}
