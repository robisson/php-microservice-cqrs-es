<?php

declare(strict_types=1);

namespace ProjectsTest\Domain\Events;

use PHPUnit\Framework\TestCase;
use Projects\Domain\Events\ProjectWasCreated;
use \DateTimeImmutable;

class ProjectWasCreatedTest extends TestCase
{
    public function testShoudCallRepositoryCreateProjectMethod()
    {
        $fakeProjectEvent = [
          'name' => 'project',
          'ocurredOn' => new DateTimeImmutable()
        ];

        $event = new ProjectWasCreated(
            $fakeProjectEvent['ocurredOn'],
            $fakeProjectEvent['name']
        );
          
        $this->assertEquals($fakeProjectEvent['name'], $event->getName());
        $this->assertEquals($fakeProjectEvent['ocurredOn'], $event->getOcurredOn());

        $this->assertEquals(
            json_encode($fakeProjectEvent),
            $event->jsonSerialize()
        );
    }
}
