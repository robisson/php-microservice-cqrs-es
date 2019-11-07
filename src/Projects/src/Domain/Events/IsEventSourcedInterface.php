<?php
declare(strict_types=1);

namespace Projects\Domain\Events;

/**
 * An AggregateRoot, that can be reconstituted from an AggregateHistory.
 */
interface IsEventSourcedInterface
{
    /**
     * @param AggregateHistory $aggregateHistory
     * @return RecordsEvents
     */
    public static function reconstituteFrom(AggregateHistory $aggregateHistory);
    /**
     * @return IdentifiesAggregate
     */
    // @todo do we need this here?
    //public function getAggregateId();
}