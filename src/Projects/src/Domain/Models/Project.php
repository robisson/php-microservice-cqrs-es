<?php

declare(strict_types=1);

namespace Projects\Domain\Models;

use Projects\Domain\Events\ProjectWasCreated;
use Projects\Domain\Events\DomainModelEvent;
use Projects\Domain\Events\RecordsEventsInterface;

class Project extends DomainModelEvent
{
    private $name;

    private function __construct($name)
    {
        $this->name = $name;
    }

    public static function create($name) : RecordsEventsInterface
    {
        $newProject = new Project($name);

        $newProject->recordThat(
            new ProjectWasCreated(new \DateTimeImmutable(), $name)
        );

        return $newProject;
    }
}
