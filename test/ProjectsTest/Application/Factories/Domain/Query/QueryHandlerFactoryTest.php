<?php

declare(strict_types=1);

namespace ProjectsTest\Application\Factories\Domain\Query;

use PHPUnit\Framework\TestCase;
use Projects\Application\Factories\Domain\Query\QueryHandlerFactory;
use Psr\Container\ContainerInterface;
use Projects\Application\Cqs\QueryHandlerInterface;
use Illuminate\Database\Capsule\Manager;
use Projects\Domain\Queries\ListAllProjectsHandler;

class QueryHandlerFactoryTest extends TestCase
{
    public function testFactoryShoudRetuanApplicationBusIntance()
    {
        $container = $this->prophesize(ContainerInterface::class);
        $container->get(Manager::class)->shouldBeCalledTimes(1);

        $queryHandlerFactory = new QueryHandlerFactory;

        $this->assertInstanceOf(
            QueryHandlerInterface::class,
            $queryHandlerFactory(
                $container->reveal(),
                ListAllProjectsHandler::class
            )
        );
    }
}
