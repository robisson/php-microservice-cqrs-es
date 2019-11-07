<?php

declare(strict_types=1);

namespace ProjectsTest\Domain\Models;

use PHPUnit\Framework\TestCase;
use Projects\Infrastructure\Persistence\Repositories\ProjectViewRepository;

class ProjectViewRepositoryTest extends TestCase
{
    public function testShouldCallAllEloquentModeltMethod()
    {
        $repository = $this->prophesize(ProjectViewRepository::class);
        $repository->all()->shouldBeCalled();

        $repository->reveal()->getAll();
    }
}
