<?php

declare(strict_types=1);

namespace Projects\Domain\Repositories;

use Projects\Domain\Events\RecordsEventsInterface;

interface ProjectRepositoryInterface
{
    public function createProject(RecordsEventsInterface $aggregateEvents) : void;
}
