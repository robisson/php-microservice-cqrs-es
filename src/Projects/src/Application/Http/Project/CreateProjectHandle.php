<?php

declare(strict_types=1);

namespace Projects\Application\Http\Project;

use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Zend\Diactoros\Response\JsonResponse;
use Projects\Domain\Commands\CreateProjectCommand;
use Projects\Application\Cqs\ApplicationBus;

class CreateProjectHandle implements RequestHandlerInterface
{
    private $applicationBus;

    public function __construct(ApplicationBus $applicationBus)
    {
        $this->applicationBus = $applicationBus;
    }

    public function handle(ServerRequestInterface $request) : ResponseInterface
    {
        $params = $request->getParsedBody();
        $name = $params['name'];

        $createProjectCommand = new CreateProjectCommand($name);

        $this->applicationBus->executeCommand($createProjectCommand);

        return new JsonResponse(['success' => true]);
    }
}
