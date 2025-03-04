<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactFormRequest extends FormRequest
{
  public function authorize(): bool
  {
    return true;
  }

  public function rules(): array
  {
    return [
      'first_name' => ['required', 'string', 'max:255'],
      'last_name' => ['required', 'string', 'max:255'],
      'company' => ['nullable', 'string', 'max:255'],
      'email' => ['required', 'email', 'max:255'],
      'phone' => ['required', 'string', 'max:20'],
      'message' => ['required', 'string', 'max:5000'],
      'billboard_id' => ['nullable', 'exists:billboards,id'],
    ];
  }

  public function messages(): array
  {
    return [
      'email.required' => 'We need your email address to contact you.',
      'phone.required' => 'Please provide your phone number so we can reach you.',
      'message.required' => 'Please let us know what you\'re interested in.',
    ];
  }
}
