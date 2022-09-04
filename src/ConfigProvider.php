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

use HyperfExtension\Jwt\Commands\GenJwtKeypairCommand;
use HyperfExtension\Jwt\Commands\GenJwtSecretCommand;
use HyperfExtension\Jwt\Contracts\JwtFactoryInterface;
use HyperfExtension\Jwt\Contracts\ManagerInterface;
use HyperfExtension\Jwt\Contracts\PayloadValidatorInterface;
use HyperfExtension\Jwt\Contracts\RequestParser\RequestParserInterface;
use HyperfExtension\Jwt\Contracts\TokenValidatorInterface;
use HyperfExtension\Jwt\RequestParser\RequestParserFactory;
use HyperfExtension\Jwt\Validators\PayloadValidator;
use HyperfExtension\Jwt\Validators\TokenValidator;

class ConfigProvider
{
    public function __invoke(): array
    {
        return [
            'dependencies' => [
                ManagerInterface::class => ManagerFactory::class,
                TokenValidatorInterface::class => TokenValidator::class,
                PayloadValidatorInterface::class => PayloadValidator::class,
                RequestParserInterface::class => RequestParserFactory::class,
                JwtFactoryInterface::class => JwtFactory::class,
            ],
            'commands' => [
                GenJwtSecretCommand::class,
                GenJwtKeypairCommand::class,
            ],
            'publish' => [
                [
                    'id' => 'config',
                    'description' => 'The config for hyperf-extension/jwt.',
                    'source' => __DIR__ . '/../publish/jwt.php',
                    'destination' => BASE_PATH . '/config/autoload/jwt.php',
                ],
            ],
        ];
    }
}
