<?php

declare(strict_types=1);

namespace Projects\Domain\Events;

use Projects\Domain\Events\DomainEventInterface;
use \DateTimeImmutable;
use \JsonSerializable;
use \SplFixedArray;

class ProjectWasCreated implements DomainEventInterface, JsonSerializable
{
    private $ocurredOn;
    private $name;

    public function __construct(DateTimeImmutable $ocurredOn, String $name)
    {
        $this->ocurredOn = $ocurredOn;
        $this->name = $name;
    }

    public function getOcurredOn() : DateTimeImmutable
    {
        return $this->ocurredOn;
    }

    public function getName() : String
    {
        return $this->name;
    }

    public function jsonSerialize() : String
    {
        return json_encode(
            ['name' => $this->name, 'ocurredOn' => $this->ocurredOn]
        );
    }
}
