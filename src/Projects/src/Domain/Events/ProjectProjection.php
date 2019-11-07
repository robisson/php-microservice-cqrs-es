<?php

declare(strict_types=1);

namespace Projects\Domain\Events;

use Projects\Domain\Events\ProjectWasCreated;

interface ProjectProjection
{
    public function projectWasCreated(ProjectWasCreated $event) : void;
}
