<?php

declare(strict_types=1);

namespace ProjectsTest\Domain\Models;

use PHPUnit\Framework\TestCase;
use Projects\Infrastructure\Persistence\EventStore\PDOEventStore;
use Projects\Domain\Events\DomainEvents;
use Projects\Domain\Events\ProjectWasCreated;

class PDOEventStoreTest extends TestCase
{
    public function testShouldCallSaveMethod()
    {
        $pdo = $this->getMockBuilder(PDOEventStore::class)
        
        ->getMock();

        $event = new ProjectWasCreated(new \DateTimeImmutable(), 'name');

        $events = new DomainEvents([$event]);

        $this->assertNull($pdo->commit($events));
    }
}
