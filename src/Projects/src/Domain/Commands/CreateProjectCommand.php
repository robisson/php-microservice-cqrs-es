<?php

declare(strict_types=1);

namespace Projects\Domain\Commands;

use Projects\Application\Cqs\CommandInterface;

class CreateProjectCommand implements CommandInterface
{
    private $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }
}
