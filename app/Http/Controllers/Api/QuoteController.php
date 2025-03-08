<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Quote;
use App\Models\User;
use App\Notifications\NewQuoteRequest;
use App\Rules\PhoneNumber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use libphonenumber\PhoneNumberUtil;
use libphonenumber\NumberParseException;

class QuoteController extends Controller
{
  public function store(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'billboard_id' => ['required', 'exists:billboards,id'],
      'name' => ['required', 'string', 'max:255'],
      'email' => ['required', 'email', 'max:255'],
      'phone' => ['required', 'string', new PhoneNumber],
      'company' => ['nullable', 'string', 'max:255'],
      'start_date' => ['required', 'date', 'after_or_equal:today'],
      'duration' => ['required', 'integer', Rule::in([1, 3, 6, 12])],
      'message' => ['nullable', 'string', 'max:1000'],
    ]);

    if ($validator->fails()) {
      return response()->json([
        'message' => 'Validation failed',
        'errors' => $validator->errors()
      ], 422);
    }

    $quoteRequest = Quote::create($validator->validated());

    // You might want to send notifications here
    $admins = User::where('is_admin', true)->get();
    Notification::send($admins, new NewQuoteRequest($quoteRequest));

    return response()->json([
      'message' => 'Quote request submitted successfully',
      'data' => $quoteRequest
    ], 201);
  }
}
