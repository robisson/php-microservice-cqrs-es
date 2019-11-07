<?php
declare(strict_types=1);

namespace Projects\Domain\Events;

use Projects\Domain\Events\DomainEvents;

interface ProjectionInterface
{
    public function project(DomainEvents $eventStream);
}