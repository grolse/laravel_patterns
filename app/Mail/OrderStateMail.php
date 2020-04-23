<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderStateMail extends Mailable
{
    use Queueable, SerializesModels;

    private $stateName;

    /**
     * Create a new message instance.
     *
     * @param string $stateName
     */
    public function __construct(string $stateName)
    {
        $this->stateName = $stateName;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->to('newrec@example.com')->text('order_mail')->with('state', $this->stateName);
    }
}
