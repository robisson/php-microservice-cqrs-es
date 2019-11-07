<?php

declare(strict_types=1);

namespace ProjectsTest\Domain\Events;

use PHPUnit\Framework\TestCase;
use Projects\Domain\Events\DomainEvents;

class DomainEventsTest extends TestCase
{
    public function testShoudThrownsException()
    {
        $this->expectException(\TypeError::class);

        $domainEvent = new DomainEvents([1]);
    }
}
