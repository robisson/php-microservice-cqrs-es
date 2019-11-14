<?php

declare(strict_types=1);

namespace Projects\Domain\Queries;

use Projects\Application\Cqs\QueryHandlerInterface;
use Projects\Application\Cqs\QueryInterface;
use Projects\Domain\Repositories\ProjectViewRepositoryInterface;

class ListAllProjectsHandler implements QueryHandlerInterface
{
    private $repository;

    public function __construct(ProjectViewRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function handle(QueryInterface $query = null)
    {
        return $this->repository->all();
    }
}
