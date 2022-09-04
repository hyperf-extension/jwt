<?php

declare(strict_types=1);
/**
 * This file is part of hyperf-extension/jwt
 *
 * @link     https://github.com/hyperf-extension/jwt
 * @contact  admin@ilover.me
 * @license  https://github.com/hyperf-extension/jwt/blob/master/LICENSE
 */
namespace HyperfExtension\Jwt\Exceptions;

use Exception;
use HyperfExtension\Jwt\Contracts\ClaimInterface;

class InvalidClaimException extends JwtException
{
    /**
     * Constructor.
     *
     * @param int $code
     */
    public function __construct(ClaimInterface $claim, $code = 0, Exception $previous = null)
    {
        parent::__construct('Invalid value provided for claim [' . $claim->getName() . ']', $code, $previous);
    }
}
