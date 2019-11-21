<?php

declare(strict_types=1);

namespace Projects\Infrastructure\MessageQueue;

interface PublisherInterface
{
    public function publish(String $topic, $payload) : void;
}
