<?php


namespace App\State;


class StateFactory
{
    public static function getState(string $state): StateInterface
    {
        switch ($state) {
            case StateInterface::NEW:
                return new NewOrderState();
            case OrderInProgressState::IN_PROGRESS:
                return new OrderInProgressState();
            case PayedState::PAYED:
                return new PayedState();
            case CompletedState::COMPLETED:
                return new CompletedState();
        }
    }
}
