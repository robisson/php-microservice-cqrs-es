<?php

declare(strict_types=1);

namespace Projects\Application\Factories\Application\Cqs;

use Psr\Container\ContainerInterface;
use Projects\Application\Cqs\ApplicationBus;

class ApplicationBusFactory
{
    public function __invoke(ContainerInterface $container):ApplicationBus
    {
        return ApplicationBus::instance($container);
    }
}
