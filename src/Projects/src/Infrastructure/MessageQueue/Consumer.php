<?php
class Consumer
{
    public function __construct(ApplicationBus $application)
    {
    }

    public function execute(AMQPMessage $message)
    {
        $type = $message->get('type');
        
        $event = json_decode($message->body);
        $eventBody = json_decode($event->event_body);

        try {
            $points = 5;
            $this->commandBus->handle(
                new RewardUserCommand($eventBody->user_id->id, $points)
            );
        } catch (AggregateDoesNotExist $e) {
            // Noop }
            return true;
        }
        
        return false;
    }
}
