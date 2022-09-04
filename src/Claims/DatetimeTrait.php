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

use DateInterval;
use DateTimeInterface;
use HyperfExtension\Jwt\Exceptions\InvalidClaimException;
use HyperfExtension\Jwt\Utils;

trait DatetimeTrait
{
    /**
     * Time leeway in seconds.
     *
     * @var int
     */
    protected $leeway = 0;

    /**
     * Set the claim value, and call a validate method.
     *
     * @param mixed $value
     *
     * @throws \HyperfExtension\Jwt\Exceptions\InvalidClaimException
     *
     * @return $this
     */
    public function setValue($value)
    {
        if ($value instanceof DateInterval) {
            $value = Utils::now()->add($value);
        }

        if ($value instanceof DateTimeInterface) {
            $value = $value->getTimestamp();
        }

        return parent::setValue($value);
    }

    /**
     * {@inheritdoc}
     */
    public function validateCreate($value)
    {
        if (! is_numeric($value)) {
            throw new InvalidClaimException($this);
        }

        return $value;
    }

    /**
     * Set the leeway in seconds.
     *
     * @return $this
     */
    public function setLeeway(int $leeway)
    {
        $this->leeway = $leeway;

        return $this;
    }

    /**
     * Determine whether the value is in the future.
     *
     * @param mixed $value
     */
    protected function isFuture($value): bool
    {
        return Utils::isFuture((int) $value, (int) $this->leeway);
    }

    /**
     * Determine whether the value is in the past.
     *
     * @param mixed $value
     */
    protected function isPast($value): bool
    {
        return Utils::isPast((int) $value, (int) $this->leeway);
    }
}
