<?php

namespace App\Http\Controllers;

use App\Models\Newsletter;
use App\Http\Requests\NewsletterSubscriptionRequest;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
  public function subscribe(NewsletterSubscriptionRequest $request)
  {
    try {
      // Check if email already exists
      if (Newsletter::where('email', $request->email)->exists()) {
        return back()->with('info', 'You are already subscribed to our newsletter!');
      }

      // Create new subscription
      Newsletter::create([
        'email' => $request->email,
        'status' => 'subscribed',
        'ip_address' => $request->ip(),
      ]);

      // You might want to trigger a welcome email here
      // Mail::to($request->email)->send(new WelcomeToNewsletter());

      return back()->with('success', 'Thank you for subscribing to our newsletter!');
    } catch (\Exception $e) {
      report($e);
      return back()->with('error', 'Sorry, there was a problem with your subscription. Please try again.');
    }
  }

  public function unsubscribe(Request $request, $token)
  {
    $subscriber = Newsletter::where('unsubscribe_token', $token)->first();

    if (!$subscriber) {
      return abort(404);
    }

    $subscriber->update([
      'status' => 'unsubscribed',
      'unsubscribed_at' => now(),
    ]);

    return view('pages.newsletter.unsubscribed');
  }
}
