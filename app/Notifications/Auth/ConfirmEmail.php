<?php

namespace App\Notifications\Auth;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ConfirmEmail extends Notification
{
    use Queueable;

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {

        return (new MailMessage)
            ->subject(__('notification.auth.confirm_email.mail.subject', ['app' => config('app.name')]))
            ->greeting(__('notification.auth.confirm_email.mail.greeting', ['user' => $notifiable->name]))
            ->line(__('notification.auth.confirm_email.mail.line.0'))
            ->action(__('notification.auth.confirm_email.mail.action'), route('confirm', [$notifiable->confirmation_code]))
            ->line(__('notification.auth.confirm_email.mail.line.1'))
            ->line(__('notification.auth.confirm_email.mail.line.2', ['email' => config('mail.from.address')]));
    }
}
