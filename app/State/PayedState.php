<?php


namespace App\State;


class PayedState implements StateInterface
{
    public function next(OrderStateContext $context)
    {
        $context->setState(new CompletedState());
    }

    public function getName(): string
    {
        return StateInterface::PAYED;
    }

}
