<?php

declare(strict_types=1);

namespace ProjectsTest\Handler;

use PHPUnit\Framework\TestCase;
use Projects\Domain\Queries\ListAllProjectsHandler;
use Projects\Infrastructure\Persistence\Repositories\ProjectViewRepository;
use Projects\Domain\Queries\ListAllProjectsQuery;

class ListAllProjectsHandlerTest extends TestCase
{
    public function testShoudToCreateQueryAndReturnAProjectsArray()
    {
        $fakeProject = ['fakeProject'];
        
        $projectViewRepositoryInterface = \Mockery::mock(ProjectViewRepository::class);
        $projectViewRepositoryInterface->shouldReceive('all')->andReturn($fakeProject);

        $listAllProjectsHandler = new ListAllProjectsHandler($projectViewRepositoryInterface);
              
        $this->assertEquals($fakeProject, $listAllProjectsHandler->handle());
    }
}
