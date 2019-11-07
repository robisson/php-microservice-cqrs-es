<?php

declare(strict_types=1);

namespace Projects\Application\Cqs;

use Exception;

class HandlerNotFoundException extends Exception
{
    public function __construct($class)
    {
        parent::__construct(sprintf('Unable to find a registered handler for "%s"', $class), 0, null);
    }
}
