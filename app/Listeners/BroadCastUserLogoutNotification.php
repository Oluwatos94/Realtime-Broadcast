<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Logout;
use App\Events\UserSessionChanged;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Broadcast;
use Illuminate\Contracts\Queue\ShouldQueue;

class BroadCastUserLogoutNotification
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
    public function handle(Logout $event): void
    {
        BroadCast(new UserSessionChanged("{$event->user->name} is offline", 'danger'));
    }
}
