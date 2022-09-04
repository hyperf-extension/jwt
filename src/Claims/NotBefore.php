<?php

declare(strict_types=1);
/**
 * This file is part of hyperf-extension/jwt
 *
 * @link     https://github.com/hyperf-extension/jwt
 * @contact  admin@ilover.me
 * @license  https://github.com/hyperf-extension/jwt/blob/master/LICENSE
 */
namespace HyperfExtension\Jwt\Claims;

use HyperfExtension\Jwt\Exceptions\TokenInvalidException;

class NotBefore extends AbstractClaim
{
    use DatetimeTrait;

    protected $name = 'nbf';

    public function validate(bool $ignoreExpired = false): bool
    {
        if ($this->isFuture($this->getValue())) {
            throw new TokenInvalidException('Not Before (nbf) timestamp cannot be in the future');
        }
        return true;
    }
}
