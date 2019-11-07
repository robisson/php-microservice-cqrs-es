<?php

declare(strict_types=1);

namespace Projects\Application\Http\Project;

use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Zend\Diactoros\Response\JsonResponse;
use Projects\Domain\Queries\ListAllProjectsQuery;
use Projects\Application\Cqs\ApplicationBus;

class ListAllProjectsHandle implements RequestHandlerInterface
{
    private $applicationBus;

    public function __construct(ApplicationBus $applicationBus)
    {
        $this->applicationBus = $applicationBus;
    }

    public function handle(ServerRequestInterface $request) : ResponseInterface
    {
        $listAllProjectQuery = new ListAllProjectsQuery();

        $projects = $this->applicationBus->executeQuery($listAllProjectQuery);

        return new JsonResponse(['projects' => $projects]);
    }
}
