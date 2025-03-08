@extends('emails.layouts.base')

@section('title', 'New Quote Request')

@section('content')
  <h1>New Billboard Quote Request</h1>

  <p>Hello {{ $notifiable->name }},</p>

  <p>A new quote request has been submitted for the following billboard:</p>

  <div style="margin: 24px 0; padding: 16px; background-color: #f9fafb; border-radius: 6px;">
    <h2 style="margin-bottom: 16px;">Billboard Details</h2>
    <div class="data-row">
      <div class="data-label">Name</div>
      <div class="data-value">{{ $quoteRequest->billboard->name }}</div>
    </div>
    <div class="data-row">
      <div class="data-label">Location</div>
      <div class="data-value">{{ $quoteRequest->billboard->location }}</div>
    </div>
    <div class="data-row">
      <div class="data-label">Monthly Rate</div>
      <div class="data-value">{{ number_format($quoteRequest->billboard->monthly_rate) }} MWK</div>
    </div>
  </div>

  <div style="margin: 24px 0; padding: 16px; background-color: #f9fafb; border-radius: 6px;">
    <h2 style="margin-bottom: 16px;">Customer Information</h2>
    <div class="data-row">
      <div class="data-label">Name</div>
      <div class="data-value">{{ $quoteRequest->name }}</div>
    </div>
    <div class="data-row">
      <div class="data-label">Email</div>
      <div class="data-value">{{ $quoteRequest->email }}</div>
    </div>
    <div class="data-row">
      <div class="data-label">Phone</div>
      <div class="data-value">{{ $quoteRequest->phone }}</div>
    </div>
    @if($quoteRequest->company)
      <div class="data-row">
        <div class="data-label">Company</div>
        <div class="data-value">{{ $quoteRequest->company }}</div>
      </div>
    @endif
  </div>

  <div style="margin: 24px 0; padding: 16px; background-color: #f9fafb; border-radius: 6px;">
    <h2 style="margin-bottom: 16px;">Request Details</h2>
    <div class="data-row">
      <div class="data-label">Start Date</div>
      <div class="data-value">{{ $quoteRequest->start_date->format('F j, Y') }}</div>
    </div>
    <div class="data-row">
      <div class="data-label">Duration</div>
      <div class="data-value">{{ $quoteRequest->duration }} month(s)</div>
    </div>
    @if($quoteRequest->message)
      <div class="data-row">
        <div class="data-label">Additional Message</div>
        <div class="data-value">{{ $quoteRequest->message }}</div>
      </div>
    @endif
  </div>

  <div style="margin: 24px 0; text-align: center;">
    <a href="{{ route('admin.quote-requests.show', $quoteRequest->id) }}" class="button" target="_blank">
      View Quote Request
    </a>
  </div>
@endsection
