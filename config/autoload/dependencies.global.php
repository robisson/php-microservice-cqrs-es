<?php

declare(strict_types=1);

return [
    // Provides application-wide services.
    // We recommend using fully-qualified class names whenever possible as
    // service names.
    'dependencies' => [
        // Use 'aliases' to alias a service name to another service. The
        // key is the alias name, the value is the service to which it points.
        'aliases' => [
          
        ],
        // Use 'invokables' for constructor-less services, or services that do
        // not require arguments to the constructor. Map a service name to the
        // class name.
        'invokables' => [
            
          
        ],
        // Use 'factories' for services provided by callbacks/factory classes.
        'factories'  => [
          // Eloquent Adapter
          Illuminate\Database\Capsule\Manager::class =>
            Projects\Infrastructure\Persistence\EventStore\DatabaseConectorFactory::class,

          // command bus
          Projects\Application\Cqs\ApplicationBus::class =>
            Projects\Application\Factories\Application\Cqs\ApplicationBusFactory::class,

          //CommandHandler
          Projects\Domain\Commands\CreateProjectHandler::class =>
            Projects\Application\Factories\Domain\Command\CommandHandlerFactory::class,
          
          //QueryHandler
          Projects\Domain\Queries\ListAllProjectsHandler::class =>
            Projects\Application\Factories\Domain\Query\QueryHandlerFactory::class,

          // http
          Projects\Application\Http\Project\CreateProjectHandle::class =>
            Projects\Application\Factories\Application\Http\RequestHandlerFactory::class,
            
          Projects\Application\Http\Project\ListAllProjectsHandle::class =>
            Projects\Application\Factories\Application\Http\RequestHandlerFactory::class
        ],
    ],
];
