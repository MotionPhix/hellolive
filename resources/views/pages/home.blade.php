@extends('layouts.app-layout')

@section('content')
  {{-- Hero Section --}}
  <section class="relative bg-cover bg-center h-[500px] flex items-center justify-center text-center text-white" style="background-image: url('{{ asset('images/hero-bg.jpg') }}');">
    <div class="bg-black bg-opacity-50 p-6 rounded-lg">
      <h1 class="text-4xl font-bold">Your Billboard, Your Audience</h1>
      <p class="mt-2 text-lg">Find the perfect outdoor advertising location in Malawi & Zambia</p>
      <a href="{{ route('billboards') }}" class="mt-4 inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg">Browse Billboards</a>
    </div>
  </section>

  {{-- Featured Billboards --}}
  <section class="container mx-auto px-4 py-12">
    <h2 class="text-3xl font-bold text-center mb-6">Featured Billboards</h2>
    <div class="grid md:grid-cols-3 gap-6">
      @foreach ($featuredBillboards as $billboard)
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
          <img src="{{ asset('storage/' . $billboard->image) }}" alt="{{ $billboard->location }}" class="w-full h-48 object-cover">
          <div class="p-4">
            <h3 class="text-xl font-semibold">{{ $billboard->location }}</h3>
            <p class="text-gray-600">{{ $billboard->city }}, {{ $billboard->country }}</p>
            <a href="{{ route('billboards.show', $billboard) }}" class="text-blue-600 hover:underline mt-2 inline-block">View Details</a>
          </div>
        </div>
      @endforeach
    </div>
  </section>

  {{-- How It Works --}}
  <section class="bg-gray-100 py-12">
    <div class="container mx-auto px-4 text-center">
      <h2 class="text-3xl font-bold mb-6">How It Works</h2>
      <div class="grid md:grid-cols-3 gap-8">
        <div class="p-6 bg-white shadow-md rounded-lg">
          <h3 class="text-xl font-semibold">1. Search</h3>
          <p class="text-gray-600">Browse billboards by location, size, and availability.</p>
        </div>
        <div class="p-6 bg-white shadow-md rounded-lg">
          <h3 class="text-xl font-semibold">2. Book</h3>
          <p class="text-gray-600">Secure your preferred billboard space with ease.</p>
        </div>
        <div class="p-6 bg-white shadow-md rounded-lg">
          <h3 class="text-xl font-semibold">3. Advertise</h3>
          <p class="text-gray-600">Launch your campaign and reach your audience.</p>
        </div>
      </div>
    </div>
  </section>

  {{-- Testimonials --}}
  <section class="container mx-auto px-4 py-12">
    <h2 class="text-3xl font-bold text-center mb-6">What Our Clients Say</h2>
    <div class="grid md:grid-cols-2 gap-6">
      @foreach ($testimonials as $testimonial)
        <div class="p-6 bg-white shadow-md rounded-lg">
          <p class="text-gray-600 italic">"{{ $testimonial->content }}"</p>
          <p class="text-gray-800 font-semibold mt-4">- {{ $testimonial->author }}</p>
        </div>
      @endforeach
    </div>
  </section>

  {{-- Contact Section --}}
  <section class="bg-blue-600 text-white py-12 text-center">
    <h2 class="text-3xl font-bold">Get in Touch</h2>
    <p class="mt-2 text-lg">Have questions? Reach out to us.</p>
    <a href="{{ route('contact') }}" class="mt-4 inline-block bg-white text-blue-600 font-semibold py-2 px-4 rounded-lg hover:bg-gray-200">Contact Us</a>
  </section>
@endsection
