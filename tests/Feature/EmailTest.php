<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Quote;
use App\Models\Contact;
use App\Notifications\NewQuoteRequest;
use App\Notifications\NewContactInquiry;
use Illuminate\Support\Facades\Notification;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EmailTest extends TestCase
{
  use RefreshDatabase;

  public function test_quote_request_email_is_sent()
  {
    Notification::fake();

    $admin = User::factory()->create(['is_admin' => true]);
    $quoteRequest = Quote::factory()->create();

    $response = $this->postJson('/api/quote-requests', $quoteRequest->toArray());

    $response->assertStatus(201);

    Notification::assertSentTo(
      [$admin],
      NewQuoteRequest::class,
      function ($notification) use ($quoteRequest) {
        return $notification->quoteRequest->id === $quoteRequest->id;
      }
    );
  }

  public function test_contact_email_is_sent()
  {
    Notification::fake();

    $admin = User::factory()->create(['is_admin' => true]);
    $contact = Contact::factory()->create();

    $response = $this->post('/contact', $contact->toArray());

    $response->assertRedirect();

    Notification::assertSentTo(
      [$admin],
      NewContactInquiry::class,
      function ($notification) use ($contact) {
        return $notification->contact->id === $contact->id;
      }
    );
  }
}
