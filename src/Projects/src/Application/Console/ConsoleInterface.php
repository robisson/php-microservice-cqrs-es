<?php

declare(strict_types=1);

namespace Projects\Application\Console;

use Symfony\Component\Console\Input\InputInterface;

interface ConsoleInterface
{
    public function execute(InputInterface $payload) : void;
}
