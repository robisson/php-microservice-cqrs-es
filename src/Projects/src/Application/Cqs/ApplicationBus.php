<?php

declare(strict_types=1);

namespace Projects\Application\Cqs;

use Psr\Container\ContainerInterface;

class ApplicationBus implements BusInterface
{
    private static $instance = null;

    private $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public static function instance(ContainerInterface $container) : ApplicationBus
    {
        if (null === static::$instance) {
            static::$instance = new self($container);
        }

        return static::$instance;
    }

    public function executeCommand(CommandInterface $command) : void
    {
        $this->execute($command);
    }

    public function executeQuery(QueryInterface $query)
    {
        return $this->execute($query);
    }

    private function getHandlerClassName($command) : String
    {
        $commandClassName = get_class($command);
        $partsClassName = explode('\\', $commandClassName);
        $onlyCommandClassName = $partsClassName[count($partsClassName)-1];

        $commandHandlerClassName = stristr($onlyCommandClassName, 'Command') == 'Command' ?
          str_replace('Command', 'Handler', $onlyCommandClassName) :
          str_replace('Query', 'Handler', $onlyCommandClassName);
        ;

        return str_replace($onlyCommandClassName, $commandHandlerClassName, $commandClassName);
    }

    private function execute($class)
    {
        $handlerClass = $this->getHandlerClassName($class);

        if (!class_exists($handlerClass)) {
            throw new HandlerNotFoundException(get_class($class));
        }

        $handler = $this->container->get($handlerClass);

        return $handler->handle($class);
    }
}
