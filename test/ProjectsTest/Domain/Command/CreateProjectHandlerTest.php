<?php

declare(strict_types=1);

namespace ProjectsTest\Handler;

use Projects\Domain\Commands\CreateProjectHandler;
use PHPUnit\Framework\TestCase;
use Projects\Domain\Repositories\ProjectRepositoryInterface;
use Projects\Domain\Commands\CreateProjectCommand;
use Projects\Domain\Models\Project;

class CreateProjectHandlerTest extends TestCase
{
    public function testShoudCallRepositoryCreateProjectMethod()
    {
        $repository = $this->prophesize(ProjectRepositoryInterface::class);

        $repository->createProject(\Prophecy\Argument::type(Project::class))
          ->will(function () {
          })->shouldBeCalledTimes(1);
          
        $commandHandler = new CreateProjectHandler($repository->reveal());

        $commandHandler->handle(new CreateProjectCommand('commandName'));
    }
    
    public function testShoudThrowsExcpetion()
    {
        $repository = $this->prophesize(ProjectRepositoryInterface::class);

        $commandHandler = new CreateProjectHandler($repository->reveal());

        $this->expectException(\InvalidArgumentException::class);
        
        $commandHandler->handle(new CreateProjectCommand(''));
    }
}
