<?php

declare(strict_types=1);

namespace ProjectsTest\Domain\Models;

use PHPUnit\Framework\TestCase;
use Projects\Infrastructure\Persistence\Repositories\ProjectRepository;
use Projects\Infrastructure\Persistence\EventStore\PDOEventStore;
use Projects\Infrastructure\Persistence\Projections\ProjectProjection;
use Projects\Domain\Events\RecordsEventsInterface;
use Projects\Domain\Events\DomainEvents;
use Projects\Domain\Events\ProjectWasCreated;

class ProjectProjectionTest extends TestCase
{
    public function testShouldCallSaveMethod()
    {
        $projetProjection = $this->createMock(ProjectProjection::class);

        $projetProjection->method('save')
                      ->willReturn(null);

        $ProjectWasCreated = new ProjectWasCreated(new \DateTimeImmutable(), 'name');

        $this->assertNull($projetProjection->projectWasCreated($ProjectWasCreated));
    }
}
