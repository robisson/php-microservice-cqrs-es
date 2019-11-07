<?php

declare(strict_types=1);

namespace ProjectsTest\Application\Cqs;

use Projects\Application\Cqs\ApplicationBus;
use Projects\Application\Cqs\HandlerNotFoundException;
use PHPUnit\Framework\TestCase;
use Psr\Container\ContainerInterface;
use Projects\Domain\Commands\CreateProjectCommand;
use Projects\Domain\Commands\CreateProjectHandler;
use Projects\Application\Cqs\CommandInterface;
use Projects\Application\Cqs\CommandHandlerInterface;
use Projects\Domain\Queries\ListAllProjectsQuery;
use Projects\Domain\Queries\ListAllProjectsHandler;
use Projects\Application\Cqs\QueryHandlerInterface;

class FakeCommand implements CommandInterface
{
}

class ApplicationBusTest extends TestCase
{
    protected $applicationBus;

    public function setUp()
    {
        $commandHandler = $this->createMock(CommandHandlerInterface::class);
        $commandHandler->method('handle')
               ->willReturn(null);
        
        $container = $this->prophesize(ContainerInterface::class);
        $container->get(CreateProjectHandler::class)->willReturn($commandHandler);
      
        
        $this->applicationBus = ApplicationBus::instance($container->reveal());
    }

    public function testInstanceMethodShoudReturnApplicationBus()
    {
        $this->assertInstanceOf(ApplicationBus::class, $this->applicationBus);
    }

    public function testExecuteCommandShoudReturnNull()
    {
        $command = new CreateProjectCommand('projectName');

        $this->assertNull($this->applicationBus->executeCommand($command));
    }
    
    public function testShouldThrowExceptionIfCommandDoesNotExists()
    {
        $this->expectException(HandlerNotFoundException::class);

        $command =  new FakeCommand();

        $this->applicationBus->executeCommand($command);
    }

    public function testExecuteQueryShoudReturnAllProjects()
    {
        $response = ['response'];
        
        $queryHandler = $this->createMock(QueryHandlerInterface::class);
        $queryHandler->method('handle')
             ->willReturn($response);

        $container = $this->prophesize(ContainerInterface::class);
        $container->get(ListAllProjectsHandler::class)->willReturn($queryHandler);

        $applicationBus = new ApplicationBus($container->reveal());
        $query = new ListAllProjectsQuery();
        
        $this->assertEquals($response, $applicationBus->executeQuery($query));
    }
}
