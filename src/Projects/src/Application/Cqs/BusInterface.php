<?php

declare(strict_types=1);

namespace Projects\Application\Cqs;

interface BusInterface
{
    public function executeCommand(CommandInterface $command);
    public function executeQuery(QueryInterface $query);
}
