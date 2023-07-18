<?php

namespace Crm\Customer\Listeners;

use Crm\Project\Events\CustomerCreation;

class SendWelcomeEmail
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(CustomerCreation $event): void
    {
        //
    }
}
