<?php
declare(strict_types=1);

namespace Projects\Infrastructure\Persistence\EventStore;

use Projects\Domain\Events\DomainEvents;
use Projects\Infrastructure\Persistence\EventStore\EventStoreInterface;
use Illuminate\Database\Eloquent\Model as EloquentModel;

class PDOEventStore extends EloquentModel implements EventStoreInterface
{
    protected $table = 'events';

    protected $primaryKey = 'id';
    
    /**
     * @param DomainEvents $events
     * @return void
     */
    public function commit(DomainEvents $events)
    {
        foreach ($events as $event) {
            $this->type  = get_class($event);
            $this->created_at  = $event->getOcurredOn();
            $this->data  = $event->jsonSerialize();

            $this->save();
        }
    }
}
