<?php
declare(strict_types=1);

namespace Projects\Domain\Events;

use ArrayAccess;
use Countable;
use Iterator;
use SplFixedArray;

abstract class ImmutableArray extends SplFixedArray implements Countable, Iterator, ArrayAccess
{
    public function __construct(array $items)
    {
        parent::__construct(count($items));
        $i = 0;
        foreach ($items as $item) {
            $this->guardType($item);
            parent::offsetSet($i++, $item);
        }
    }
    /**
     * Throw when the item is not an instance of the accepted type.
     * @throws \InvalidArgumentException
     * @param $item
     * @return void
     */
    abstract protected function guardType($item);
}
