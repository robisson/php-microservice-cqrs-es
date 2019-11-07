<?php

declare(strict_types=1);

namespace Projects\Domain\Commands;

use Projects\Application\Cqs\CommandHandlerInterface;
use Projects\Application\Cqs\CommandInterface;
use Projects\Domain\Repositories\ProjectRepositoryInterface;
use Projects\Domain\Models\Project;

class CreateProjectHandler implements CommandHandlerInterface
{
    private $repository;

    public function __construct(ProjectRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function handle(CommandInterface $command) : void
    {
        $projectName = $command->getName();

        if (empty($projectName)) {
            throw new \InvalidArgumentException("A project must be specified");
        }

        $newProject = Project::create($projectName);
        
        $this->repository->createProject($newProject);
    }
}
