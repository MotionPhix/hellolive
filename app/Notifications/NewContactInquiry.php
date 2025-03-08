<?php

namespace App\Notifications;

use App\Models\Contact;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewContactInquiry extends Notification implements ShouldQueue
{
  use Queueable;

  public function __construct(
    protected Contact $contact
  ) {}

  public function via($notifiable): array
  {
    return ['mail'];
  }

  public function toMail($notifiable): MailMessage
  {
    return (new MailMessage)
      ->subject('Enquiry From Your Website')
      ->markdown('emails.contact-query', [
        'contact' => $this->contact,
        'notifiable' => $notifiable
      ]);
  }
}
