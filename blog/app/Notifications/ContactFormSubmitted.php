<?php

namespace App\Notifications;


use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class ContactFormSubmitted extends Notification
{
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('New Contact Form Submission')
            ->line('A new contact form submission has been received.')
            ->line('Details:')
            ->line('Name: ' . $this->data['name'])
            ->line('Email: ' . $this->data['email'])
            ->line('Message: ' . $this->data['message']);
    }
}
