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

interface StorageInterface
{
    /**
     * @param mixed $value
     */
    public function add(string $key, $value, int $ttl);

    /**
     * @param mixed $value
     */
    public function forever(string $key, $value);

    /**
     * @return mixed
     */
    public function get(string $key);

    public function destroy(string $key): bool;

    public function flush(): void;
}
