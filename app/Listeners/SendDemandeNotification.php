<?php

namespace App\Listeners;

use App\Mail\DemandeNotification;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification as FacadesNotification;

class SendDemandeNotification
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
    public function handle(object $event): void
    {
        $admin = User::where('role', 1)->first();
        FacadesNotification::send($admin, new DemandeNotification($event->user));
    }
}