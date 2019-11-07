<?php
declare(strict_types=1);

namespace Projects\Domain\Events;

use Projects\Domain\Events\DomainEventInterface;

class DomainEvents extends ImmutableArray
{
    /**
     * Throw when the type of item is not accepted.
     *
     * @param $item
     * @throws ArrayIsImmutable
     * @return void
     */
    protected function guardType($item)
    {
        if(!($item instanceof DomainEventInterface)) {
            throw new \TypeError('A DomainEvent muest be a DomainEventInterface istanceof');
        }
    }
}