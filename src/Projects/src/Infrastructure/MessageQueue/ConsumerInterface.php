<?php

declare(strict_types=1);

namespace Projects\Infrastructure\MessageQueue;

interface ConsumerInterface
{
    public function onMessage();
}
