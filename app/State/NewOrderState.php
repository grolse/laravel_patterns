<?php


namespace App\State;


class NewOrderState implements StateInterface
{
    public function next(OrderStateContext $context)
    {
        $context->setState(new OrderInProgressState());
    }

    public function getName(): string
    {
        return StateInterface::NEW;
    }
}
