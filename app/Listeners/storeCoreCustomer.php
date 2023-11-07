<?php

namespace App\Listeners;

use App\Events\CustomerRegistered;
use App\Repositories\CoreCustomerRepository;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class storeCoreCustomer
{
    /**
     * Create the event listener.
     *
     * @return void
     */

    public function __construct()
    {
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\CustomerRegistered  $event
     * @return void
     */
    public function handle(CustomerRegistered $event)
    {
        CoreCustomerRepository::store($event->data);
    }
}
