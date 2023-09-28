<?php

namespace App\Listeners;

use App\Events\carCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Cache;

class notifyAdmin
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
    public function handle(carCreated $event): void
    {
        print_r("ddd");
        //We can send a mail from here
        echo ".. From Listeners";
        exit;
        //
        // Cache::put($event->car->vehicleidno,$event->car->vehicleidno);
        // info('have been save', $event->car->vehicleidno);
    }
}
