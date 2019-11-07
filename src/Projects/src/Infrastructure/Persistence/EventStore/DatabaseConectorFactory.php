<?php

declare(strict_types=1);

namespace Projects\Infrastructure\Persistence\EventStore;

use Psr\Container\ContainerInterface;
use Illuminate\Database\Capsule\Manager;

class DatabaseConectorFactory
{
    public function __invoke(ContainerInterface $container) : void
    {
        $capsule = new Manager();
        $capsule->addConnection($container->get('config')['eloquent']);
        $capsule->setAsGlobal();
        $capsule->bootEloquent();
    }
}
