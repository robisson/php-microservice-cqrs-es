<?php

declare(strict_types=1);

namespace Projects\Application\Cqs;

interface QueryHandlerInterface
{
    public function handle(QueryInterface $query = null);
}
