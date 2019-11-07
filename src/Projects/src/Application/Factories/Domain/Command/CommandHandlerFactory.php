<?php

declare(strict_types=1);

namespace Projects\Application\Factories\Domain\Command;

use Psr\Container\ContainerInterface;
use Projects\Infrastructure\Persistence\Repositories\ProjectRepository;
use Projects\Infrastructure\Persistence\Projections\ProjectProjection;
use Projects\Application\Cqs\CommandHandlerInterface;
use Projects\Infrastructure\Persistence\EventStore\PDOEventStore;
use Illuminate\Database\Capsule\Manager;

class CommandHandlerFactory
{
    public function __invoke(ContainerInterface $container, $commandHandler) : CommandHandlerInterface
    {
        $container->get(Manager::class);

        return new $commandHandler(
            new ProjectRepository(
                new PDOEventStore(),
                new ProjectProjection()
            )
        );
    }
}
