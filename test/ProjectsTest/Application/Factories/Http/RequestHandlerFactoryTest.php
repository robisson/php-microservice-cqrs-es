<?php

declare(strict_types=1);

namespace ProjectsTest\Application\Factories\Http;

use PHPUnit\Framework\TestCase;

use Projects\Application\Factories\Application\Http\RequestHandlerFactory;
use Projects\Application\Cqs\ApplicationBus;
use Psr\Container\ContainerInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Projects\Application\Http\Project\ListAllProjectsHandle;

class RequestHandlerFactoryTest extends TestCase
{
    public function testFactoryShoudRetuanApplicationBusIntance()
    {
        $requestHandleFactory = new RequestHandlerFactory;
        $container = $this->prophesize(ContainerInterface::class);
        $applicationBus = $this->prophesize(ApplicationBus::class);

        $container->get(ApplicationBus::class)->willReturn($applicationBus->reveal());

        $this->assertInstanceOf(
            RequestHandlerInterface::class,
            $requestHandleFactory(
                $container->reveal(),
                ListAllProjectsHandle::class
            )
        );
    }
}
