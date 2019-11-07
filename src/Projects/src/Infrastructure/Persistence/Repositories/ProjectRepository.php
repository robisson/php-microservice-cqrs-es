<?php

declare(strict_types=1);

namespace Projects\Infrastructure\Persistence\Repositories;

use Projects\Domain\Repositories\ProjectRepositoryInterface;
use Projects\Domain\Events\RecordsEventsInterface;
use Projects\Infrastructure\Persistence\EventStore\PDOEventStore;
use Projects\Infrastructure\Persistence\Projections\ProjectProjection;

class ProjectRepository implements ProjectRepositoryInterface
{
    private $eventStore;

    private $postProjection;

    public function __construct(PDOEventStore $eventStore, ProjectProjection $postProjection)
    {
        $this->eventStore = $eventStore;
        $this->postProjection = $postProjection;
    }

    public function createProject(RecordsEventsInterface $aggregateEvents) : void
    {
        $events = $aggregateEvents->getRecordedEvents();
        $this->eventStore->commit($events);
        $this->postProjection->project($events);
    }
}
