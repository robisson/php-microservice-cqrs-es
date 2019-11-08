<?php

declare(strict_types=1);

namespace ProjectsTest\Application\Console;

use PHPUnit\Framework\TestCase;
use Projects\Application\Console\ConsoleGateway;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Projects\Application\Console\ConsoleInterface;

class FakeCommandConsole implements ConsoleInterface
{
    public function execute(InputInterface $payload) : void
    {
    }
}

class ConsoleGatewayTest extends TestCase
{
    private $className = 'ProjectsTest\Application\Console\FakeCommandConsole';
    
    public function testShouldThrowsException()
    {
        $input = $this->prophesize(InputInterface::class);
        $input->getArgument(\Prophecy\Argument::any())->willReturn('someClass');

        $output = $this->prophesize(OutputInterface::class);
        
        $consoleGateway = new ConsoleGateway();

        $this->expectException(\InvalidArgumentException::class);

        $this->invokeMethod($consoleGateway, 'execute', array($input->reveal(), $output->reveal()));
    }

    public function testCallMethodExecuteOfTheCommand()
    {
        $input = $this->prophesize(InputInterface::class);
        $input->getArgument(\Prophecy\Argument::any())->willReturn($this->className);

        $output = $this->prophesize(OutputInterface::class);
        
        $consoleGateway = new ConsoleGateway();

        $this->assertNull($this->invokeMethod($consoleGateway, 'execute', array($input->reveal(), $output->reveal())));
    }

    public function invokeMethod(&$object, $methodName, array $parameters = array())
    {
        $reflection = new \ReflectionClass(get_class($object));
        $method = $reflection->getMethod($methodName);
        $method->setAccessible(true);

        return $method->invokeArgs($object, $parameters);
    }
}
