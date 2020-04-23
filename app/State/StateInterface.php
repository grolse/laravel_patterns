<?php


namespace App\State;


interface StateInterface
{
    public const NEW = 'new';
    public const IN_PROGRESS = 'in_progress';
    public const PAYED = 'payed';
    public const COMPLETED = 'completed';

    public function next(OrderStateContext $context);
    public function getName(): string;
}
