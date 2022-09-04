<?php

declare(strict_types=1);
/**
 * This file is part of hyperf-extension/jwt
 *
 * @link     https://github.com/hyperf-extension/jwt
 * @contact  admin@ilover.me
 * @license  https://github.com/hyperf-extension/jwt/blob/master/LICENSE
 */
namespace HyperfExtension\Jwt\Storage;

use HyperfExtension\Jwt\Contracts\StorageInterface;
use Psr\SimpleCache\CacheInterface;

class HyperfCache implements StorageInterface
{
    /**
     * The cache repository contract.
     *
     * @var \Psr\SimpleCache\CacheInterface
     */
    protected $cache;

    /**
     * The used cache tag.
     *
     * @var string
     */
    protected $tag;

    /**
     * Constructor.
     */
    public function __construct(CacheInterface $cache, string $tag)
    {
        $this->cache = $cache;
        $this->tag = $tag;
    }

    public function add(string $key, $value, int $ttl)
    {
        $this->cache->set($this->resolveKey($key), $value, $ttl);
    }

    public function forever(string $key, $value)
    {
        $this->cache->set($this->resolveKey($key), $value);
    }

    public function get(string $key)
    {
        return $this->cache->get($this->resolveKey($key));
    }

    public function destroy(string $key): bool
    {
        return $this->cache->delete($this->resolveKey($key));
    }

    public function flush(): void
    {
        method_exists($cache = $this->cache, 'clearPrefix')
            ? $cache->clearPrefix($this->tag)
            : $cache->clear();
    }

    protected function cache(): CacheInterface
    {
        return $this->cache;
    }

    protected function resolveKey(string $key)
    {
        return $this->tag . '.' . $key;
    }
}
