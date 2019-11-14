<?php

declare(strict_types=1);

namespace Projects\Infrastructure\Persistence\Repositories;

use Illuminate\Database\Eloquent\Model as EloquentModel;
use Projects\Domain\Repositories\ProjectViewRepositoryInterface;

class ProjectViewRepository extends EloquentModel implements ProjectViewRepositoryInterface
{
    protected $table = 'projects';

    protected $primaryKey = 'id';
}
