<?php


namespace App\State;


class CompletedState implements StateInterface
{
    public function next(OrderStateContext $context)
    {
    }

    public function getName(): string
    {
        return StateInterface::COMPLETED;
    }
}
