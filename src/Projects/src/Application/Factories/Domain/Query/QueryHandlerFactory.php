<?php

declare(strict_types=1);

namespace Projects\Application\Factories\Domain\Query;

use Psr\Container\ContainerInterface;
use Projects\Infrastructure\Persistence\Repositories\ProjectViewRepository;
use Projects\Application\Cqs\QueryHandlerInterface;
use Projects\Infrastructure\Persistence\EventStore\PDOEventStore;
use Illuminate\Database\Capsule\Manager;

class QueryHandlerFactory
{
    public function __invoke(ContainerInterface $container, $queryHandler) : QueryHandlerInterface
    {
        $container->get(Manager::class);

        return new $queryHandler(
            new ProjectViewRepository()
        );
    }
}
