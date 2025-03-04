@extends('layouts.app')

@section('title', 'Unsubscribed from Newsletter')
@section('meta_description', 'You have been successfully unsubscribed from our newsletter.')

@section('content')
  <div class="min-h-[60vh] flex items-center">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
      <div class="text-center">
        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 19v-8.93a2 2 0 01.89-1.664l7-4.666a2 2 0 012.22 0l7 4.666A2 2 0 0121 10.07V19M3 19a2 2 0 002 2h14a2 2 0 002-2M3 19l6.75-4.5M21 19l-6.75-4.5M3 10l6.75 4.5M21 10l-6.75 4.5m0 0l-1.14.76a2 2 0 01-2.22 0l-1.14-.76" />
        </svg>
        <h2 class="mt-4 text-3xl font-bold text-gray-900">Successfully Unsubscribed</h2>
        <p class="mt-2 text-lg text-gray-600">
          You have been unsubscribed from our newsletter. We're sorry to see you go!
        </p>
        <div class="mt-6">
          <a href="{{ route('home') }}" class="text-indigo-600 hover:text-indigo-500">
            Return to Homepage
          </a>
        </div>
      </div>
    </div>
  </div>
@endsection
