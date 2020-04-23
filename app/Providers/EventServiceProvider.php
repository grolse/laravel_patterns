<?php

namespace App\Providers;

use App\Events\MailSentEvent;
use App\Events\OrderStateChangedEvent;
use App\Listeners\MailSentListener;
use App\Listeners\StateEventListener;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],

        OrderStateChangedEvent::class => [
            StateEventListener::class
        ],

        MailSentEvent::class => [
            MailSentListener::class
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
