<?php

namespace Projects\Infrastructure\Persistence\EventStore;

use Projects\Domain\Events\DomainEvents;

interface EventStoreInterface
{
    /**
     * @param DomainEvents $events
     *
     * @return void
     */
    public function commit(DomainEvents $events);
}
