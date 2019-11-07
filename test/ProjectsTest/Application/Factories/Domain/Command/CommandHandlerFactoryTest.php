<?php

declare(strict_types=1);

namespace ProjectsTest\Application\Factories\Domain\Command;

use PHPUnit\Framework\TestCase;
use Projects\Application\Factories\Domain\Command\CommandHandlerFactory;
use Psr\Container\ContainerInterface;
use Projects\Application\Cqs\CommandHandlerInterface;
use Illuminate\Database\Capsule\Manager;
use Projects\Domain\Commands\CreateProjectHandler;

class CommandHandlerFactoryTest extends TestCase
{
    public function testFactoryShoudRetuanApplicationBusIntance()
    {
        $container = $this->prophesize(ContainerInterface::class);
        $container->get(Manager::class)->shouldBeCalledTimes(1);

        $commandHandlerFactory = new CommandHandlerFactory;

        $this->assertInstanceOf(
            CommandHandlerInterface::class,
            $commandHandlerFactory(
                $container->reveal(),
                CreateProjectHandler::class
            )
        );
    }
}
