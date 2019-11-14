<?php

declare(strict_types=1);

namespace ProjectsTest\Domain\Models;

use PHPUnit\Framework\TestCase;
use Projects\Infrastructure\Persistence\Repositories\ProjectViewRepository;
use Illuminate\Database\Eloquent\Model;
use Projects\Domain\Repositories\ProjectViewRepositoryInterface;

class ProjectViewRepositoryTest extends TestCase
{
    public function testShouldToValidateInstanceOfRepository()
    {
        $repository = new ProjectViewRepository();

        $this->assertInstanceOf(Model::class, $repository);
        $this->assertInstanceOf(ProjectViewRepositoryInterface::class, $repository);
    }
}
