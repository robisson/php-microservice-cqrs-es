<?php

declare(strict_types=1);

namespace ProjectsTest\Handler;

use PHPUnit\Framework\TestCase;
use Projects\Domain\Queries\ListAllProjectsHandler;
use Projects\Domain\Repositories\ProjectViewRepositoryInterface;
use Projects\Domain\Queries\ListAllProjectsQuery;

class ListAllProjectsHandlerTest extends TestCase
{
    public function testShoudToCreateQueryAndReturnAProjectsArray()
    {
        $fakeProject = ['fakeProject'];

        $repository = $this->prophesize(ProjectViewRepositoryInterface::class);

        $repository->getAll()->willReturn($fakeProject)
          ->shouldBeCalledTimes(1);
          
        $queryHandler = new ListAllProjectsHandler($repository->reveal());

        $this->assertEquals(
            $fakeProject,
            $queryHandler->handle(new ListAllProjectsQuery())
        );
    }
}
