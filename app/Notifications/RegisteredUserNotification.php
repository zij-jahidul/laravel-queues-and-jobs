<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class RegisteredUserNotification extends Notification
{
    use Queueable;

    protected $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    public function via($notifiable)
    {
        return ('mail');
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->line('Hi' . $notifiable->name)
            ->line('New user has registered !')
            ->line('Email : ' . $this->user->email)
            ->line('Thank you for using our application!');
    }
}
