<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsletterSubscriptionRequest extends FormRequest
{
  public function authorize(): bool
  {
    return true;
  }

  public function rules(): array
  {
    return [
      'email' => ['required', 'email', 'max:255'],
    ];
  }

  public function messages(): array
  {
    return [
      'email.required' => 'Please provide your email address.',
      'email.email' => 'Please provide a valid email address.',
    ];
  }
}
