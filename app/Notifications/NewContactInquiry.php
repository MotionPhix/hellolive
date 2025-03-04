<?php

namespace App\Notifications;

use App\Models\Contact;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewContactInquiry extends Notification
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
    $message = (new MailMessage)
      ->subject('New Contact Inquiry from ' . $this->contact->first_name)
      ->greeting('Hello!')
      ->line('You have received a new contact inquiry from the website.')
      ->line('Name: ' . $this->contact->first_name . ' ' . $this->contact->last_name)
      ->line('Email: ' . $this->contact->email)
      ->line('Phone: ' . $this->contact->phone);

    if ($this->contact->company) {
      $message->line('Company: ' . $this->contact->company);
    }

    if ($this->contact->billboard) {
      $message->line('Inquiry about billboard: ' . $this->contact->billboard->name);
    }

    return $message
      ->line('Message:')
      ->line($this->contact->message)
      ->action('View in Admin Panel', url('/admin/contacts/' . $this->contact->id));
  }
}
