<?php

namespace App\Listeners;

use App\Events\MailSentEvent;
use App\Events\OrderStateChangedEvent;
use App\Mail\OrderStateMail;
use Illuminate\Support\Facades\Mail;

class StateEventListener
{
    /**
     * Handle the event.
     *
     * @param  OrderStateChangedEvent  $event
     * @return void
     */
    public function handle(OrderStateChangedEvent $event)
    {
        $state = $event->getState();
        Mail::send(new OrderStateMail($state->getName()));

        event(new MailSentEvent('Mail for state .'.$state->getName(). ' was sent'));
    }
}
