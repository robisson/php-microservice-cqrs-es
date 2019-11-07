<?php

declare(strict_types=1);

namespace ProjectsTest\Handler;

use Projects\Domain\Commands\CreateProjectCommand;
use PHPUnit\Framework\TestCase;

class CreateProjectCommandTest extends TestCase
{
    public function testShoudCreateProjectAndReturnItsName()
    {
        $name = 'projectName';

        $projectCommand = new CreateProjectCommand($name);

        $this->assertEquals($projectCommand->getName(), $name);
    }
}
