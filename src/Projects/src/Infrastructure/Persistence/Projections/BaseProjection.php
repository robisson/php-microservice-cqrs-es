<?php

declare(strict_types=1);

namespace Projects\Infrastructure\Persistence\Projections;

use Projects\Domain\Events\DomainEvents;
use Projects\Domain\Events\ProjectionInterface;
use Projects\Domain\Events\DomainEventInterface;

abstract class BaseProjection extends PersistenceManager implements ProjectionInterface
{
    public function project(DomainEvents $eventStream)
    {
        foreach ($eventStream as $event) {
            $projectMethod = $this->extractNameMethod($event);

            $this->$projectMethod($event);
        }
    }

    private function extractNameMethod(DomainEventInterface $event) : String
    {
        $lasWordOfMethod = explode('.', str_replace('\\', '.', get_class($event)));
        $lasWordOfMethod = end($lasWordOfMethod);
        
        return lcfirst($lasWordOfMethod);
    }
}
