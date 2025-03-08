<?php

namespace App\Notifications;

use App\Models\Quote;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewQuoteRequest extends Notification implements ShouldQueue
{
  use Queueable;

  public function __construct(
    protected Quote $quoteRequest
  ) {}

  public function via($notifiable): array
  {
    return ['mail'];
  }

  public function toMail($notifiable): MailMessage
  {
    return (new MailMessage)
      ->subject('New Billboard Quote Request - ' . $this->quoteRequest->billboard->name)
      ->markdown('emails.quote-request', [
        'quoteRequest' => $this->quoteRequest,
        'notifiable' => $notifiable
      ]);
  }
}
