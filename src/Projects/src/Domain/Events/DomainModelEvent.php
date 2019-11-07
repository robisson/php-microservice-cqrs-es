<?php

declare(strict_types=1);

namespace Projects\Domain\Events;

use Projects\Domain\Events\RecordsEventsInterface;
use Projects\Domain\Events\IsEventSourcedInterface;
use Projects\Domain\Events\DomainEventInterface;
use Projects\Domain\Events\DomainEvents;

abstract class DomainModelEvent implements RecordsEventsInterface
{
    protected $recordedEvents = [];
    
    protected function recordThat(DomainEventInterface $aDomainEvent)
    {
        $this->recordedEvents[] = $aDomainEvent;
    }

    public function getRecordedEvents()
    {
        return new DomainEvents($this->recordedEvents);
    }

    public function clearRecordedEvents()
    {
        $this->recordedEvents = [];
    }
}
