<?php

declare(strict_types=1);

namespace Projects\Domain\Events;

/**
 * An object that records the events that happened to it since the last time it was cleared, or since it was
 * restored from persistence.
 */
interface RecordsEventsInterface
{
    /**
     * Get all the Domain Events that were recorded since the last time it was cleared, or since it was
     * restored from persistence. This does not include events that were recorded prior.
     * @return DomainEvents
     */
    public function getRecordedEvents();
    /**
     * Clears the record of new Domain Events. This doesn't clear the history of the object.
     * @return void
     */
    public function clearRecordedEvents();
}