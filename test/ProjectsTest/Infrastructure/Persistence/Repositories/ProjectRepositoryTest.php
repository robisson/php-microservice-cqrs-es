<?php

declare(strict_types=1);

namespace ProjectsTest\Domain\Models;

use PHPUnit\Framework\TestCase;
use Projects\Infrastructure\Persistence\Repositories\ProjectRepository;
use Projects\Infrastructure\Persistence\EventStore\PDOEventStore;
use Projects\Infrastructure\Persistence\Projections\ProjectProjection;
use Projects\Domain\Events\RecordsEventsInterface;
use Projects\Domain\Events\DomainEvents;

class ProjectRepositoryTest extends TestCase
{
    public function testShouldCallCreateAProjectMethod()
    {
        $pdoEventStore = $this->prophesize(PDOEventStore::class);
        $postProjection = $this->prophesize(ProjectProjection::class);

        $pdoEventStore->commit(\Prophecy\Argument::type(DomainEvents::class))
          ->shouldBeCalledTimes(1);
        $postProjection->project(\Prophecy\Argument::type(DomainEvents::class))
          ->shouldBeCalledTimes(1);

        $repository = new ProjectRepository($pdoEventStore->reveal(), $postProjection->reveal());

        $events = $this->prophesize(RecordsEventsInterface::class);
        $events->getRecordedEvents()->willReturn(new DomainEvents([]));

        $this->assertNull($repository->createProject($events->reveal()));
    }
}
