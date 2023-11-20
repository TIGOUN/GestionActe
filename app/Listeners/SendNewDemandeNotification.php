<?php

namespace App\Listeners;


use App\Models\User;
use App\Notifications\DemandeNotification;
use Illuminate\Support\Facades\Notification;

class SendNewDemandeNotification
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        
    }

    /**
     * Handle the event.
     */
    public function handle($event)
    {
        $admins = User::whereHas('roles', function ($query) {
                $query->where('id', 1);
            })->get();

        Notification::send($admins, new DemandeNotification($event->demande));
    }
}