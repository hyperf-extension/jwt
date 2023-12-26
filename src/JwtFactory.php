<?php

declare(strict_types=1);
/**
 * This file is part of hyperf-extension/jwt
 *
 * @link     https://github.com/hyperf-extension/jwt
 * @contact  admin@ilover.me
 * @license  https://github.com/hyperf-extension/jwt/blob/master/LICENSE
 */
namespace HyperfExtension\Jwt;

use Hyperf\Contract\ConfigInterface;
use HyperfExtension\Jwt\Contracts\JwtFactoryInterface;

use function Hyperf\Support\make;

class JwtFactory implements JwtFactoryInterface
{
    protected $lockSubject = true;

    public function __construct(ConfigInterface $config)
    {
        $this->lockSubject = (bool) $config->get('jwt.lock_subject');
    }

    public function make(): Jwt
    {
        return make(Jwt::class)->setLockSubject($this->lockSubject);
    }
}
