<?php

namespace App\Notifications;

use App\Models\Demande;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class DemandeNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */

    protected $demande;
    protected $admins;

    
    public function __construct(Demande $demande, User $admins)
    {
        $this->demande = $demande;
        $this->admins = $admins;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }


    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'code' => $this->demande->code_demande,
        ];
    }
}