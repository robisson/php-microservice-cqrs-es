<?php

declare(strict_types=1);

namespace ProjectsTest\Domain\Queries;

use PHPUnit\Framework\TestCase;
use Projects\Domain\Queries\ListAllProjectsQuery;
use Projects\Application\Cqs\QueryInterface;

class ListAllProjectsQueryTest extends TestCase
{
    public function testShoudToCreateInstanceQueryInterface()
    {
        $query = new ListAllProjectsQuery();

        $this->assertInstanceOf(QueryInterface::class, $query);
    }
}
