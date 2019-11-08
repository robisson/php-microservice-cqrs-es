<?php

declare(strict_types=1);

namespace Projects\Application\Console;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class ConsoleGateway extends Command
{
    protected function configure()
    {
        $this
          ->setName('execute')
          ->addArgument(
              'class',
              InputArgument::OPTIONAL,
              'Which class do you want to execute?'
          );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $className = $input->getArgument('class');

        if (!class_exists($className)) {
            throw new \InvalidArgumentException("The class does not exists");
        }

        (new $className($input))->execute($input);
    }
}
