<?php

declare(strict_types=1);

namespace Projects\Domain\Events;

use \DateTimeImmutable;

interface DomainEventInterface
{
    public function getOcurredOn() : DateTimeImmutable;
}
