<?php

declare(strict_types=1);

namespace Projects\Application\Factories\Application\Http;

use Psr\Container\ContainerInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Projects\Application\Cqs\ApplicationBus;

class RequestHandlerFactory
{
    public function __invoke(ContainerInterface $container, String $requestedHandle) : RequestHandlerInterface
    {
        return new $requestedHandle($container->get(ApplicationBus::class));
    }
}
