<?php

declare(strict_types=1);
/**
 * This file is part of hyperf-extension/jwt
 *
 * @link     https://github.com/hyperf-extension/jwt
 * @contact  admin@ilover.me
 * @license  https://github.com/hyperf-extension/jwt/blob/master/LICENSE
 */
namespace HyperfExtension\Jwt\RequestParser\Handlers;

use HyperfExtension\Jwt\Contracts\RequestParser\HandlerInterface as ParserContract;
use Psr\Http\Message\ServerRequestInterface;

class AuthHeaders implements ParserContract
{
    /**
     * The header name.
     *
     * @var string
     */
    protected $header = 'authorization';

    /**
     * The header prefix.
     *
     * @var string
     */
    protected $prefix = 'bearer';

    public function parse(ServerRequestInterface $request): ?string
    {
        $header = $request->getHeaderLine($this->header);

        if ($header and preg_match('/' . $this->prefix . '\s*(\S+)\b/i', $header, $matches)) {
            return $matches[1];
        }

        return null;
    }

    /**
     * Set the header name.
     *
     * @return $this
     */
    public function setHeaderName(string $headerName)
    {
        $this->header = $headerName;

        return $this;
    }

    /**
     * Set the header prefix.
     *
     * @return $this
     */
    public function setHeaderPrefix(string $headerPrefix)
    {
        $this->prefix = $headerPrefix;

        return $this;
    }
}
