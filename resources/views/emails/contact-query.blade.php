@extends('emails.layouts.base')

@section('title', 'New Contact Message')

@section('content')
  <h1>New Contact Form Submission</h1>

  <p>Hello {{ $notifiable->name }},</p>

  <p>A new message has been submitted through the contact form:</p>

  <div style="margin: 24px 0; padding: 16px; background-color: #f9fafb; border-radius: 6px;">
    <h2 style="margin-bottom: 16px;">Contact Details</h2>
    <div class="data-row">
      <div class="data-label">Name</div>
      <div class="data-value">{{ $contact->first_name }} {{ $contact->last_name }}</div>
    </div>
    <div class="data-row">
      <div class="data-label">Email</div>
      <div class="data-value">{{ $contact->email }}</div>
    </div>
    @if($contact->phone)
      <div class="data-row">
        <div class="data-label">Phone</div>
        <div class="data-value">{{ $contact->phone }}</div>
      </div>
    @endif
    @if($contact->company)
      <div class="data-row">
        <div class="data-label">Company</div>
        <div class="data-value">{{ $contact->company }}</div>
      </div>
    @endif
  </div>

  @if($contact->billboard)
    <div style="margin: 24px 0; padding: 16px; background-color: #f9fafb; border-radius: 6px;">
      <h2 style="margin-bottom: 16px;">Billboard Interest</h2>
      <div class="data-row">
        <div class="data-label">Billboard</div>
        <div class="data-value">{{ $contact->billboard->name }}</div>
      </div>
      <div class="data-row">
        <div class="data-label">Location</div>
        <div class="data-value">{{ $contact->billboard->location }}</div>
      </div>
    </div>
  @endif

  <div style="margin: 24px 0; padding: 16px; background-color: #f9fafb; border-radius: 6px;">
    <h2 style="margin-bottom: 16px;">Message</h2>
    <p style="white-space: pre-wrap;">{{ $contact->message }}</p>
  </div>

  <div style="margin: 24px 0; text-align: center;">
    <a href="{{ route('admin.contacts.show', $contact->id) }}" class="button" target="_blank">
      View Message Details
    </a>
  </div>
@endsection
