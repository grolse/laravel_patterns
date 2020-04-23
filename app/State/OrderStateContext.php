<?php


namespace App\State;


use App\Events\OrderStateChangedEvent;

class OrderStateContext
{
    /** @var StateInterface */
    private $state;

    public static function create(): OrderStateContext
    {
        $orderState = new self();
        $orderState->state = new NewOrderState();

        return $orderState;
    }

    public function next()
    {
        $this->state->next($this);
        event(new OrderStateChangedEvent($this->state));
    }

    public function setState(StateInterface $state)
    {
        $this->state = $state;
    }

    public function getName(): string
    {
        return $this->state->getName();
    }

}
