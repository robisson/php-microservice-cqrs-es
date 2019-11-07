<?php

declare(strict_types=1);

namespace ProjectsTest\Application\Factories\Cqs;

use PHPUnit\Framework\TestCase;
use Projects\Application\Factories\Application\Cqs\ApplicationBusFactory;
use Projects\Application\Cqs\ApplicationBus;
use Psr\Container\ContainerInterface;

class ApplicationBusFactoryTest extends TestCase
{
    public function testFactoryShoudRetuanApplicationBusIntance()
    {
        $applicationBusFactory = new ApplicationBusFactory;
        $container = $this->prophesize(ContainerInterface::class);

        $this->assertInstanceOf(ApplicationBus::class, $applicationBusFactory($container->reveal()));
    }
}
