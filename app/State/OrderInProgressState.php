<?php


namespace App\State;


class OrderInProgressState implements StateInterface
{
    public function next(OrderStateContext $context)
    {
        $context->setState(new PayedState());
    }

    public function getName(): string
    {
        return StateInterface::IN_PROGRESS;
    }

}
