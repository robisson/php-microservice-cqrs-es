<?php

declare(strict_types=1);

namespace ProjectsTest\Application\Http\Project;

use Projects\Application\Http\Project\ListAllProjectsHandle;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\JsonResponse;
use Projects\Application\Cqs\ApplicationBus;
use Projects\Domain\Queries\ListAllProjectsQuery;

class ListAllProjectHandleTest extends TestCase
{
    protected $applicationBus;
    protected $responseQuery = [
      'projects'=>'list projects'
    ];

    public function setUp()
    {
        $this->applicationBus = $this->prophesize(ApplicationBus::class);
        $this->applicationBus->executeQuery(\Prophecy\Argument::type(ListAllProjectsQuery::class))
          ->willReturn($this->responseQuery);
    }

    public function testResponse()
    {
        $listAllProjectsHandler = new ListAllProjectsHandle($this->applicationBus->reveal());

        $response = $listAllProjectsHandler->handle(
            $this->prophesize(ServerRequestInterface::class)->reveal()
        );

        $json = json_decode((string) $response->getBody());

        $this->assertInstanceOf(JsonResponse::class, $response);
        $this->assertEquals($this->responseQuery['projects'], $json->projects->projects);
    }
}
