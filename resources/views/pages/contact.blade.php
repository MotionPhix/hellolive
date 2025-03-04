@extends('layouts.app')

@section('title', 'Contact Us')
@section('meta_description', 'Get in touch with FirstMark Advertising for premium billboard locations in Malawi and Zambia. We\'re here to help you find the perfect advertising space for your brand.')

@section('content')
  <div class="bg-white">
    <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
      <div class="max-w-3xl mx-auto">
        <h1 class="text-3xl font-bold text-gray-900 text-center mb-8">Contact Us</h1>

        @if(session('success'))
          <div class="rounded-md bg-green-50 p-4 mb-6">
            <div class="flex">
              <div class="flex-shrink-0">
                <svg class="h-5 w-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                </svg>
              </div>
              <div class="ml-3">
                <p class="text-sm font-medium text-green-800">
                  {{ session('success') }}
                </p>
              </div>
            </div>
          </div>
        @endif

        <form action="{{ route('contact.submit') }}" method="POST" class="space-y-6">
          @csrf

          @if(request()->has('billboard'))
            <input type="hidden" name="billboard_id" value="{{ request('billboard') }}">
          @endif

          <div class="grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-8">
            <div>
              <label for="first_name" class="block text-sm font-medium text-gray-700">First name</label>
              <div class="mt-1">
                <input type="text" name="first_name" id="first_name"
                       class="block w-full shadow-sm sm:text-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md"
                       value="{{ old('first_name') }}">
                @error('first_name')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
              </div>
            </div>

            <div>
              <label for="last_name" class="block text-sm font-medium text-gray-700">Last name</label>
              <div class="mt-1">
                <input type="text" name="last_name" id="last_name"
                       class="block w-full shadow-sm sm:text-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md"
                       value="{{ old('last_name') }}">
                @error('last_name')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
              </div>
            </div>

            <div class="sm:col-span-2">
              <label for="company" class="block text-sm font-medium text-gray-700">Company</label>
              <div class="mt-1">
                <input type="text" name="company" id="company"
                       class="block w-full shadow-sm sm:text-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md"
                       value="{{ old('company') }}">
                @error('company')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
              </div>
            </div>

            <div class="sm:col-span-2">
              <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
              <div class="mt-1">
                <input type="email" name="email" id="email"
                       class="block w-full shadow-sm sm:text-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md"
                       value="{{ old('email') }}">
                @error('email')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
              </div>
            </div>

            <div class="sm:col-span-2">
              <label for="phone" class="block text-sm font-medium text-gray-700">Phone number</label>
              <div class="mt-1">
                <input type="text" name="phone" id="phone"
                       class="block w-full shadow-sm sm:text-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md"
                       value="{{ old('phone') }}">
                @error('phone')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
              </div>
            </div>

            <div class="sm:col-span-2">
              <label for="message" class="block text-sm font-medium text-gray-700">Message</label>
              <div class="mt-1">
                            <textarea name="message" id="message" rows="4"
                                      class="block w-full shadow-sm sm:text-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md">{{ old('message') }}</textarea>
                @error('message')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
              </div>
            </div>
          </div>

          <div class="sm:col-span-2">
            <button type="submit"
                    class="w-full inline-flex justify-center py-3 px-6 border border-transparent shadow-sm text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
              Send Message
            </button>
          </div>
        </form>

        <!-- Contact Information -->
        <div class="mt-16 bg-gray-50 rounded-lg overflow-hidden">
          <div class="px-6 py-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-6">Our Offices</h2>
            <div class="grid grid-cols-1 gap-8 sm:grid-cols-2">
              <!-- Malawi Office -->
              <div>
                <h3 class="text-lg font-semibold text-gray-900 mb-3">Malawi</h3>
                <div class="space-y-2 text-gray-600">
                  <p>123 Business District</p>
                  <p>Lilongwe, Malawi</p>
                  <p>Phone: +265 999 999 999</p>
                  <p>Email: malawi@firstmarkmw.com</p>
                </div>
              </div>

              <!-- Zambia Office -->
              <div>
                <h3 class="text-lg font-semibold text-gray-900 mb-3">Zambia</h3>
                <div class="space-y-2 text-gray-600">
                  <p>456 Commercial Zone</p>
                  <p>Lusaka, Zambia</p>
                  <p>Phone: +260 999 999 999</p>
                  <p>Email: zambia@firstmarkmw.com</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
