<?php

namespace App\Listeners;

use App\Events\UserSessionChanged;
use Laravel\Reverb\Events\MessageReceived;

class BroadCastUserLoginNotification
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
    public function handle(MessageReceived $event): void
    {
        // Decode the incoming message from the Reverb event
        $message = json_decode($event->message);

        // Ensure the event is of type 'UserSessionChanged'
        if ($message && $message->event === 'UserSessionChanged') {
            // Decode the data part of the message
            $messageData = json_decode($message->data);

            // Get the relevant user data
            if ($messageData && isset($messageData->user->name)) {
                $userName = $messageData->user->name;

                // Broadcast the UserSessionChanged event to others
                broadcast(new UserSessionChanged("{$userName} . is online", 'success'))->toOthers();
            }
        }
    }
}
