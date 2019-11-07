<?php

declare(strict_types=1);

namespace Projects\Infrastructure\Persistence\Projections;

use Projects\Infrastructure\Persistence\Projections;
use Projects\Domain\Events\ProjectProjection as ProjectProjectionInterface;
use Projects\Domain\Events\ProjectWasCreated;
use Projects\Infrastructure\Persistence\Projections\BaseProjection;

class ProjectProjection extends BaseProjection implements ProjectProjectionInterface
{
    protected $table = 'projects';

    protected $primaryKey = 'id';

    public function projectWasCreated(ProjectWasCreated $event) : void
    {
        $this->name = $event->getName();

        $this->save();
    }
}
