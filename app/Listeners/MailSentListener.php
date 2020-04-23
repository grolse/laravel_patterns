<?php

namespace App\Listeners;

use App\Events\MailSentEvent;
use App\Logger;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class MailSentListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param MailSentEvent $event
     * @return void
     */
    public function handle(MailSentEvent $event)
    {
        $logger = new Logger();
        $logger->message = $event->getMessage();
        $logger->save();
    }
}
