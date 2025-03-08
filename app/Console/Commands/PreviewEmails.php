<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Models\Quote;
use App\Models\Contact;
use App\Notifications\NewQuoteRequest;
use App\Notifications\NewContactInquiry;
use Illuminate\Console\Command;

class PreviewEmails extends Command
{
  protected $signature = 'email:preview {type : Type of email to preview (quote|contact)}';
  protected $description = 'Preview email templates with sample data';

  public function handle()
  {
    $type = $this->argument('type');
    $admin = User::factory()->make([
      'name' => 'Admin User',
      'email' => 'admin@example.com'
    ]);

    switch ($type) {
      case 'quote':
        $quoteRequest = Quote::factory()->make();
        $admin->notify(new NewQuoteRequest($quoteRequest));
        $this->info('Quote request email preview generated!');
        break;

      case 'contact':
        $contact = Contact::factory()->make();
        $admin->notify(new NewContactInquiry($contact));
        $this->info('Contact message email preview generated!');
        break;

      default:
        $this->error('Invalid email type specified.');
        return 1;
    }

    return 0;
  }
}
