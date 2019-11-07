<?php

declare(strict_types=1);

namespace Projects\Application\Cqs;

interface CommandHandlerInterface
{
    public function handle(CommandInterface $command) : void;
}
