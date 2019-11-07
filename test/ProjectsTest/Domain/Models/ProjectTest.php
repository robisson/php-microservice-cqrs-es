<?php

declare(strict_types=1);

namespace ProjectsTest\Domain\Models;

use PHPUnit\Framework\TestCase;
use Projects\Domain\Models\Project;
use Projects\Domain\Events\DomainEvents;

class ProjectTest extends TestCase
{
    protected $project;
    
    public function setUp()
    {
        $name = 'project';
        $this->project = Project::create($name);
    }

    public function testShouldToCreateProjectFromStaticCall()
    {
        $this->assertInstanceOf(Project::class, $this->project);
    }
    
    public function testShouldReturnDomainEvents()
    {
        $this->assertInstanceOf(DomainEvents::class, $this->project->getRecordedEvents());
    }
    
    public function testShouldToClearDomainEvents()
    {
        $this->project->clearRecordedEvents();
        $events = $this->project->getRecordedEvents();

        $this->assertEquals(0, $events->getSize());
    }
}
