<?php

declare(strict_types=1);

namespace ProjectsTest\Application\Http\Project;

use Projects\Application\Http\Project\CreateProjectHandle;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\JsonResponse;
use Projects\Application\Cqs\ApplicationBus;
use Projects\Domain\Commands\CreateProjectCommand;

class CreateProjectHandleTest extends TestCase
{
    protected $applicationBus;

    public function setUp()
    {
        $this->applicationBus = $this->prophesize(ApplicationBus::class);
        $this->applicationBus->executeCommand(\Prophecy\Argument::type(CreateProjectCommand::class))
          ->shouldBeCalledTimes(1);
    }

    public function testResponse()
    {
        $createProjectsHandler = new CreateProjectHandle($this->applicationBus->reveal());

        $request = $this->prophesize(ServerRequestInterface::class);
        $request->getParsedBody()->willReturn(['name' => 'fakeName']);

        $response = $createProjectsHandler->handle($request->reveal());

        $json = json_decode((string) $response->getBody());

        $this->assertInstanceOf(JsonResponse::class, $response);
        $this->assertTrue(isset($json->success));
    }
}
