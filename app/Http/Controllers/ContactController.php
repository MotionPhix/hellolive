<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactFormRequest;
use App\Models\Billboard;
use App\Models\Contact;
use App\Notifications\NewContactInquiry;
use Illuminate\Support\Facades\Notification;

class ContactController extends Controller
{
  public function index(Billboard $billboard = null)
  {
    return view(
      'pages.contact', compact('billboard')
    );
  }

  public function submit(ContactFormRequest $request)
  {
    $contact = Contact::create($request->validated());

    // If this is a billboard inquiry, associate it
    if ($request->billboard_id) {
      $billboard = Billboard::find($request->billboard_id);
      $contact->billboard()->associate($billboard);
      $contact->save();
    }

    // Send notification to admin
    Notification::route('mail', config('mail.admin_address'))
      ->notify(new NewContactInquiry($contact));

    return back()->with('success', 'Thank you for your message. We will get back to you soon!');
  }
}
