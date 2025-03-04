{{--@extends('layouts.app-layout')--}}

{{--@section('content')--}}
{{--  --}}{{-- Hero Section --}}
{{--  <section class="relative bg-cover bg-center h-[500px] flex items-center justify-center text-center text-white" style="background-image: url('{{ asset('images/hero-bg.jpg') }}');">--}}
{{--    <div class="bg-black bg-opacity-50 p-6 rounded-lg">--}}
{{--      <h1 class="text-4xl font-bold">Your Billboard, Your Audience</h1>--}}
{{--      <p class="mt-2 text-lg">Find the perfect outdoor advertising location in Malawi & Zambia</p>--}}
{{--      <a href="{{ route('billboards.index') }}" class="mt-4 inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg">Browse Billboards</a>--}}
{{--    </div>--}}
{{--  </section>--}}

{{--  --}}{{-- Featured Billboards --}}
{{--  <section class="container mx-auto px-4 py-12">--}}
{{--    <h2 class="text-3xl font-bold text-center mb-6">Featured Billboards</h2>--}}
{{--    <div class="grid md:grid-cols-3 gap-6">--}}
{{--      @foreach ($featuredBillboards as $billboard)--}}
{{--        <div class="bg-white shadow-md rounded-lg overflow-hidden">--}}
{{--          <img src="{{ asset('storage/' . $billboard->image) }}" alt="{{ $billboard->location }}" class="w-full h-48 object-cover">--}}
{{--          <div class="p-4">--}}
{{--            <h3 class="text-xl font-semibold">{{ $billboard->location }}</h3>--}}
{{--            <p class="text-gray-600">{{ $billboard->city }}, {{ $billboard->country }}</p>--}}
{{--            <a href="{{ route('billboards.show', $billboard) }}" class="text-blue-600 hover:underline mt-2 inline-block">View Details</a>--}}
{{--          </div>--}}
{{--        </div>--}}
{{--      @endforeach--}}
{{--    </div>--}}
{{--  </section>--}}

{{--  --}}{{-- How It Works --}}
{{--  <section class="bg-gray-100 py-12">--}}
{{--    <div class="container mx-auto px-4 text-center">--}}
{{--      <h2 class="text-3xl font-bold mb-6">How It Works</h2>--}}
{{--      <div class="grid md:grid-cols-3 gap-8">--}}
{{--        <div class="p-6 bg-white shadow-md rounded-lg">--}}
{{--          <h3 class="text-xl font-semibold">1. Search</h3>--}}
{{--          <p class="text-gray-600">Browse billboards by location, size, and availability.</p>--}}
{{--        </div>--}}
{{--        <div class="p-6 bg-white shadow-md rounded-lg">--}}
{{--          <h3 class="text-xl font-semibold">2. Book</h3>--}}
{{--          <p class="text-gray-600">Secure your preferred billboard space with ease.</p>--}}
{{--        </div>--}}
{{--        <div class="p-6 bg-white shadow-md rounded-lg">--}}
{{--          <h3 class="text-xl font-semibold">3. Advertise</h3>--}}
{{--          <p class="text-gray-600">Launch your campaign and reach your audience.</p>--}}
{{--        </div>--}}
{{--      </div>--}}
{{--    </div>--}}
{{--  </section>--}}

{{--  --}}{{-- Testimonials --}}
{{--  <section class="container mx-auto px-4 py-12">--}}
{{--    <h2 class="text-3xl font-bold text-center mb-6">What Our Clients Say</h2>--}}
{{--    <div class="grid md:grid-cols-2 gap-6">--}}
{{--      @foreach ($testimonials as $testimonial)--}}
{{--        <div class="p-6 bg-white shadow-md rounded-lg">--}}
{{--          <p class="text-gray-600 italic">"{{ $testimonial->content }}"</p>--}}
{{--          <p class="text-gray-800 font-semibold mt-4">- {{ $testimonial->author }}</p>--}}
{{--        </div>--}}
{{--      @endforeach--}}
{{--    </div>--}}
{{--  </section>--}}

{{--  --}}{{-- Contact Section --}}
{{--  <section class="bg-blue-600 text-white py-12 text-center">--}}
{{--    <h2 class="text-3xl font-bold">Get in Touch</h2>--}}
{{--    <p class="mt-2 text-lg">Have questions? Reach out to us.</p>--}}
{{--    <a href="{{ route('contact') }}" class="mt-4 inline-block bg-white text-blue-600 font-semibold py-2 px-4 rounded-lg hover:bg-gray-200">Contact Us</a>--}}
{{--  </section>--}}
{{--@endsection--}}

{{--@extends('layouts.app')--}}

{{--@section('title', 'Premier Outdoor Advertising in Malawi & Zambia')--}}
{{--@section('meta_description', 'FirstMark Advertising offers premium billboard locations across Malawi and Zambia. Transform your brand visibility with strategic outdoor advertising solutions.')--}}

{{--@section('content')--}}
{{--  <!-- Hero Section with Video Background -->--}}
{{--  <div class="relative h-screen">--}}
{{--    <div class="absolute inset-0 overflow-hidden">--}}
{{--      <video--}}
{{--        class="object-cover w-full h-full"--}}
{{--        autoplay--}}
{{--        loop--}}
{{--        muted--}}
{{--        playsinline--}}
{{--        poster="{{ asset('images/hero-poster.jpg') }}">--}}
{{--        <source src="{{ asset('videos/billboard-hero.mp4') }}" type="video/mp4">--}}
{{--      </video>--}}
{{--      <div class="absolute inset-0 bg-black bg-opacity-50"></div>--}}
{{--    </div>--}}

{{--    <div class="relative h-full flex items-center">--}}
{{--      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">--}}
{{--        <div class="text-center">--}}
{{--          <h1 class="text-4xl sm:text-5xl md:text-6xl font-extrabold text-white tracking-tight">--}}
{{--            <span class="block">Transform Your Brand's</span>--}}
{{--            <span class="block text-indigo-400">Visibility</span>--}}
{{--          </h1>--}}
{{--          <p class="mt-6 max-w-lg mx-auto text-xl sm:text-2xl text-gray-300">--}}
{{--            Strategic outdoor advertising locations across Malawi & Zambia--}}
{{--          </p>--}}
{{--          <div class="mt-10 flex justify-center space-x-4">--}}
{{--            <a href="{{ route('billboards') }}"--}}
{{--               class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 transition-colors duration-200">--}}
{{--              Explore Billboards--}}
{{--              <svg class="ml-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">--}}
{{--                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />--}}
{{--              </svg>--}}
{{--            </a>--}}
{{--            <a href="{{ route('contact') }}"--}}
{{--               class="inline-flex items-center px-6 py-3 border-2 border-white text-base font-medium rounded-md text-white hover:bg-white hover:text-gray-900 transition-colors duration-200">--}}
{{--              Contact Us--}}
{{--            </a>--}}
{{--          </div>--}}
{{--        </div>--}}
{{--      </div>--}}
{{--    </div>--}}

{{--    <!-- Scroll Indicator -->--}}
{{--    <div class="absolute bottom-10 left-1/2 transform -translate-x-1/2">--}}
{{--      <div class="animate-bounce">--}}
{{--        <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">--}}
{{--          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />--}}
{{--        </svg>--}}
{{--      </div>--}}
{{--    </div>--}}
{{--  </div>--}}

{{--  <!-- Featured Locations Section -->--}}
{{--  <section class="py-20 bg-white">--}}
{{--    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">--}}
{{--      <div class="text-center">--}}
{{--        <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">--}}
{{--          Premium Locations--}}
{{--        </h2>--}}
{{--        <p class="mt-4 text-xl text-gray-600">--}}
{{--          Discover our most impactful billboard locations--}}
{{--        </p>--}}
{{--      </div>--}}

{{--      <div class="mt-16">--}}
{{--        <div x-data="{ activeLocation: 'malawi' }" class="space-y-12">--}}
{{--          <!-- Location Tabs -->--}}
{{--          <div class="flex justify-center space-x-4">--}}
{{--            <button @click="activeLocation = 'malawi'"--}}
{{--                    :class="{'bg-indigo-600 text-white': activeLocation === 'malawi', 'bg-gray-100 text-gray-900 hover:bg-gray-200': activeLocation !== 'malawi'}"--}}
{{--                    class="px-6 py-2 rounded-full text-sm font-medium transition-colors duration-200">--}}
{{--              Malawi--}}
{{--            </button>--}}
{{--            <button @click="activeLocation = 'zambia'"--}}
{{--                    :class="{'bg-indigo-600 text-white': activeLocation === 'zambia', 'bg-gray-100 text-gray-900 hover:bg-gray-200': activeLocation !== 'zambia'}"--}}
{{--                    class="px-6 py-2 rounded-full text-sm font-medium transition-colors duration-200">--}}
{{--              Zambia--}}
{{--            </button>--}}
{{--          </div>--}}

{{--          <!-- Location Content -->--}}
{{--          <div x-show="activeLocation === 'malawi'" x-transition class="grid grid-cols-1 gap-8 md:grid-cols-3">--}}
{{--            @foreach($featuredMalawiBillboards as $billboard)--}}
{{--              <div class="relative overflow-hidden rounded-lg shadow-lg group">--}}
{{--                <img src="{{ $billboard->getFirstMediaUrl('billboard_images') }}"--}}
{{--                     alt="{{ $billboard->name }}"--}}
{{--                     class="w-full h-64 object-cover transform group-hover:scale-110 transition-transform duration-300">--}}
{{--                <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>--}}
{{--                <div class="absolute bottom-0 left-0 right-0 p-6">--}}
{{--                  <h3 class="text-xl font-bold text-white">{{ $billboard->name }}</h3>--}}
{{--                  <p class="text-sm text-gray-300">{{ $billboard->city }}</p>--}}
{{--                </div>--}}
{{--                <a href="{{ route('billboards.show', $billboard) }}" class="absolute inset-0" aria-label="View details for {{ $billboard->name }}"></a>--}}
{{--              </div>--}}
{{--            @endforeach--}}
{{--          </div>--}}

{{--          <div x-show="activeLocation === 'zambia'" x-transition class="grid grid-cols-1 gap-8 md:grid-cols-3">--}}
{{--            @foreach($featuredZambiaBillboards as $billboard)--}}
{{--              <div class="relative overflow-hidden rounded-lg shadow-lg group">--}}
{{--                <img src="{{ $billboard->getFirstMediaUrl('billboard_images') }}"--}}
{{--                     alt="{{ $billboard->name }}"--}}
{{--                     class="w-full h-64 object-cover transform group-hover:scale-110 transition-transform duration-300">--}}
{{--                <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>--}}
{{--                <div class="absolute bottom-0 left-0 right-0 p-6">--}}
{{--                  <h3 class="text-xl font-bold text-white">{{ $billboard->name }}</h3>--}}
{{--                  <p class="text-sm text-gray-300">{{ $billboard->city }}</p>--}}
{{--                </div>--}}
{{--                <a href="{{ route('billboards.show', $billboard) }}" class="absolute inset-0" aria-label="View details for {{ $billboard->name }}"></a>--}}
{{--              </div>--}}
{{--            @endforeach--}}
{{--          </div>--}}
{{--        </div>--}}
{{--      </div>--}}
{{--    </div>--}}
{{--  </section>--}}

{{--  <!-- Statistics Section -->--}}
{{--  <section class="py-20 bg-indigo-50">--}}
{{--    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">--}}
{{--      <div class="grid grid-cols-1 gap-8 md:grid-cols-4 text-center">--}}
{{--        <div class="bg-white p-8 rounded-lg shadow-sm"--}}
{{--             x-data="{ count: 0 }"--}}
{{--             x-intersect="$el.animate([{ opacity: 0 }, { opacity: 1 }], { duration: 1000 });--}}
{{--                            for(let i = 0; i <= {{ $totalBillboards }}; i++) {--}}
{{--                                setTimeout(() => count = i, i * 20)--}}
{{--                            }">--}}
{{--          <div class="text-4xl font-bold text-indigo-600" x-text="count">0</div>--}}
{{--          <div class="mt-2 text-gray-600">Total Billboards</div>--}}
{{--        </div>--}}

{{--        <div class="bg-white p-8 rounded-lg shadow-sm"--}}
{{--             x-data="{ count: 0 }"--}}
{{--             x-intersect="$el.animate([{ opacity: 0 }, { opacity: 1 }], { duration: 1000 });--}}
{{--                            for(let i = 0; i <= {{ $totalCities }}; i++) {--}}
{{--                                setTimeout(() => count = i, i * 100)--}}
{{--                            }">--}}
{{--          <div class="text-4xl font-bold text-indigo-600" x-text="count">0</div>--}}
{{--          <div class="mt-2 text-gray-600">Cities Covered</div>--}}
{{--        </div>--}}

{{--        <div class="bg-white p-8 rounded-lg shadow-sm"--}}
{{--             x-data="{ count: 0 }"--}}
{{--             x-intersect="$el.animate([{ opacity: 0 }, { opacity: 1 }], { duration: 1000 });--}}
{{--                            for(let i = 0; i <= {{ $yearsOfExperience }}; i++) {--}}
{{--                                setTimeout(() => count = i, i * 100)--}}
{{--                            }">--}}
{{--          <div class="text-4xl font-bold text-indigo-600" x-text="count">0</div>--}}
{{--          <div class="mt-2 text-gray-600">Years of Experience</div>--}}
{{--        </div>--}}

{{--        <div class="bg-white p-8 rounded-lg shadow-sm"--}}
{{--             x-data="{ count: 0 }"--}}
{{--             x-intersect="$el.animate([{ opacity: 0 }, { opacity: 1 }], { duration: 1000 });--}}
{{--                            for(let i = 0; i <= {{ $satisfiedClients }}; i++) {--}}
{{--                                setTimeout(() => count = i, i * 10)--}}
{{--                            }">--}}
{{--          <div class="text-4xl font-bold text-indigo-600" x-text="count">0</div>--}}
{{--          <div class="mt-2 text-gray-600">Satisfied Clients</div>--}}
{{--        </div>--}}
{{--      </div>--}}
{{--    </div>--}}
{{--  </section>--}}

{{--  <!-- Why Choose Us Section -->--}}
{{--  <section class="py-20 bg-white">--}}
{{--    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">--}}
{{--      <div class="text-center mb-16">--}}
{{--        <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">--}}
{{--          Why Choose FirstMark--}}
{{--        </h2>--}}
{{--        <p class="mt-4 text-xl text-gray-600">--}}
{{--          Your success is our priority--}}
{{--        </p>--}}
{{--      </div>--}}

{{--      <div class="grid grid-cols-1 gap-8 md:grid-cols-3">--}}
{{--        <div class="relative p-6 bg-white rounded-xl shadow-sm border border-gray-100 hover:shadow-lg transition-shadow duration-300">--}}
{{--          <div class="absolute -top-4 left-6">--}}
{{--            <div class="rounded-full bg-indigo-600 p-3">--}}
{{--              <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">--}}
{{--                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />--}}
{{--                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />--}}
{{--              </svg>--}}
{{--            </div>--}}
{{--          </div>--}}
{{--          <h3 class="mt-8 text-xl font-medium text-gray-900">Strategic Locations</h3>--}}
{{--          <p class="mt-4 text-gray-600">--}}
{{--            Prime billboard positions in high-traffic areas across major cities in Malawi and Zambia.--}}
{{--          </p>--}}
{{--        </div>--}}

{{--        <div class="relative p-6 bg-white rounded-xl shadow-sm border border-gray-100 hover:shadow-lg transition-shadow duration-300">--}}
{{--          <div class="absolute -top-4 left-6">--}}
{{--            <div class="rounded-full bg-indigo-600 p-3">--}}
{{--              <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">--}}
{{--                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />--}}
{{--              </svg>--}}
{{--            </div>--}}
{{--          </div>--}}
{{--          <h3 class="mt-8 text-xl font-medium text-gray-900">Quality Assurance</h3>--}}
{{--          <p class="mt-4 text-gray-600">--}}
{{--            Regular maintenance and quality checks ensure your advertisements always look their best.--}}
{{--          </p>--}}
{{--        </div>--}}

{{--        <div class="relative p-6 bg-white rounded-xl shadow-sm border border-gray-100 hover:shadow-lg transition-shadow duration-300">--}}
{{--          <div class="absolute -top-4 left-6">--}}
{{--            <div class="rounded-full bg-indigo-600 p-3">--}}
{{--              <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">--}}
{{--                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />--}}
{{--              </svg>--}}
{{--            </div>--}}
{{--          </div>--}}
{{--          <h3 class="mt-8 text-xl font-medium text-gray-900">Fast Implementation</h3>--}}
{{--          <p class="mt-4 text-gray-600">--}}
{{--            Quick turnaround times from booking to installation, ensuring your campaign launches on schedule.--}}
{{--          </p>--}}
{{--        </div>--}}
{{--      </div>--}}
{{--    </div>--}}
{{--  </section>--}}

{{--  <!-- Call to Action Section -->--}}
{{--  <section class="relative py-20 bg-indigo-600">--}}
{{--    <div class="absolute inset-0">--}}
{{--      <img src="{{ asset('images/cta-background.jpg') }}" alt="" class="w-full h-full object-cover opacity-10">--}}
{{--    </div>--}}
{{--    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">--}}
{{--      <div class="relative text-center">--}}
{{--        <h2 class="text-3xl font-extrabold text-white sm:text-4xl">--}}
{{--          Ready to Amplify Your Brand?--}}
{{--        </h2>--}}
{{--        <p class="mt-4 text-xl text-indigo-100">--}}
{{--          Let's discuss how we can help you reach your target audience effectively.--}}
{{--        </p>--}}
{{--        <div class="mt-10">--}}
{{--          <a href="{{ route('contact') }}"--}}
{{--             class="inline-flex items-center px-8 py-4 border-2 border-white text-lg font-medium rounded-md text-white hover:bg-white hover:text-indigo-600 transition-colors duration-200">--}}
{{--            Get Started Today--}}
{{--            <svg class="ml-3 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">--}}
{{--              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />--}}
{{--            </svg>--}}
{{--          </a>--}}
{{--        </div>--}}
{{--      </div>--}}
{{--    </div>--}}
{{--  </section>--}}

{{--  <!-- Testimonials Section -->--}}
{{--  <section class="py-20 bg-gray-50">--}}
{{--    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">--}}
{{--      <div class="text-center">--}}
{{--        <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">--}}
{{--          What Our Clients Say--}}
{{--        </h2>--}}
{{--      </div>--}}

{{--      <div class="mt-16">--}}
{{--        <div class="grid grid-cols-1 gap-8 md:grid-cols-3">--}}
{{--          @foreach($testimonials as $testimonial)--}}
{{--            <div class="bg-white p-6 rounded-lg shadow-sm">--}}
{{--              <div class="flex items-center mb-4">--}}
{{--                <div class="h-12 w-12 rounded-full overflow-hidden">--}}
{{--                  <img src="{{ $testimonial->avatar }}" alt="{{ $testimonial->name }}" class="h-full w-full object-cover">--}}
{{--                </div>--}}
{{--                <div class="ml-4">--}}
{{--                  <h4 class="text-lg font-medium text-gray-900">{{ $testimonial->name }}</h4>--}}
{{--                  <p class="text-sm text-gray-600">{{ $testimonial->company }}</p>--}}
{{--                </div>--}}
{{--              </div>--}}
{{--              <p class="text-gray-600 italic">{{ $testimonial->content }}</p>--}}
{{--            </div>--}}
{{--          @endforeach--}}
{{--        </div>--}}
{{--      </div>--}}
{{--    </div>--}}
{{--  </section>--}}
{{--@endsection--}}

{{--Ok, I have another idea of how we can set this website and the backend properly. I think--}}

@extends('layouts.app')

@section('title', 'Premier Outdoor Advertising in Malawi & Zambia')
@section('meta_description', 'FirstMark Advertising offers premium billboard locations across Malawi and Zambia. Transform your brand visibility with strategic outdoor advertising solutions.')

@section('content')
  <!-- Hero Section with Video Background -->
  <div class="relative h-screen">
    <div class="absolute inset-0 overflow-hidden">
      <video
        class="object-cover w-full h-full"
        autoplay
        loop
        muted
        playsinline
        poster="{{ asset('images/hero-poster.jpg') }}">
        <source src="{{ asset('videos/billboard-hero.mp4') }}" type="video/mp4">
      </video>
      <div class="absolute inset-0 bg-black bg-opacity-50"></div>
    </div>

    <div class="relative h-full flex items-center">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
          <h1 class="font-display text-4xl sm:text-5xl md:text-6xl font-extrabold text-white tracking-tight">
            <span class="block">Transform Your Brand's</span>
            <span class="block text-indigo-400">Visibility</span>
          </h1>
          <p class="mt-6 max-w-lg mx-auto text-xl sm:text-2xl text-gray-300">
            Strategic outdoor advertising locations across Malawi & Zambia
          </p>

          <div class="mt-10 flex justify-center space-x-4">
            <a href="{{ route('billboards.index') }}"
               class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 transition-colors duration-200">
              Explore Billboards
              <svg class="ml-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
              </svg>
            </a>

            <a href="{{ route('contact.index') }}"
               class="inline-flex items-center px-6 py-3 border-2 border-white text-base font-medium rounded-md text-white hover:bg-white hover:text-gray-900 transition-colors duration-200">
              Contact Us
            </a>
          </div>
        </div>
      </div>
    </div>

    <!-- Scroll Indicator -->
    <div class="absolute bottom-10 left-1/2 transform -translate-x-1/2">
      <div class="animate-bounce">
        <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
        </svg>
      </div>
    </div>
  </div>

  <!-- Featured Locations Section -->
  <section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="text-center">
        <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">
          Premium Locations
        </h2>
        <p class="mt-4 text-xl text-gray-600">
          Discover our most impactful billboard locations
        </p>
      </div>

      <div class="mt-16">
        <div x-data="{ activeLocation: 'malawi' }" class="space-y-12">
          <!-- Location Tabs -->
          <div class="flex justify-center space-x-4">
            <button
              @click="activeLocation = 'malawi'"
              :class="{'bg-indigo-600 text-white': activeLocation === 'malawi', 'bg-gray-100 text-gray-900 hover:bg-gray-200': activeLocation !== 'malawi'}"
              class="px-6 py-2 rounded-full text-sm font-medium transition-colors duration-200">
              Malawi
            </button>
            <button @click="activeLocation = 'zambia'"
                    :class="{'bg-indigo-600 text-white': activeLocation === 'zambia', 'bg-gray-100 text-gray-900 hover:bg-gray-200': activeLocation !== 'zambia'}"
                    class="px-6 py-2 rounded-full text-sm font-medium transition-colors duration-200">
              Zambia
            </button>
          </div>

          <!-- Location Content -->
          <div x-show="activeLocation === 'malawi'" x-transition class="grid grid-cols-1 gap-8 md:grid-cols-3">
            @foreach($featuredMalawiBillboards as $billboard)
              <div class="relative overflow-hidden rounded-lg shadow-lg group">
                <img src="{{ $billboard->getFirstMediaUrl('billboard_images') }}"
                     alt="{{ $billboard->name }}"
                     class="w-full h-64 object-cover transform group-hover:scale-110 transition-transform duration-300">
                <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                <div class="absolute bottom-0 left-0 right-0 p-6">
                  <h3 class="text-xl font-bold text-white">{{ $billboard->name }}</h3>
                  <p class="text-sm text-gray-300">{{ $billboard->city }}</p>
                </div>
                <a href="{{ route('billboards.show', $billboard) }}" class="absolute inset-0" aria-label="View details for {{ $billboard->name }}"></a>
              </div>
            @endforeach
          </div>

          <div x-show="activeLocation === 'zambia'" x-transition class="grid grid-cols-1 gap-8 md:grid-cols-3">
            @foreach($featuredZambiaBillboards as $billboard)
              <div class="relative overflow-hidden rounded-lg shadow-lg group">
                <img src="{{ $billboard->getFirstMediaUrl('billboard_images') }}"
                     alt="{{ $billboard->name }}"
                     class="w-full h-64 object-cover transform group-hover:scale-110 transition-transform duration-300">
                <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                <div class="absolute bottom-0 left-0 right-0 p-6">
                  <h3 class="text-xl font-bold text-white">{{ $billboard->name }}</h3>
                  <p class="text-sm text-gray-300">{{ $billboard->city }}</p>
                </div>
                <a href="{{ route('billboards.show', $billboard) }}" class="absolute inset-0" aria-label="View details for {{ $billboard->name }}"></a>
              </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Statistics Section -->
  <section class="py-20 bg-indigo-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="grid grid-cols-1 gap-8 md:grid-cols-4 text-center">
        <div class="bg-white p-8 rounded-lg shadow-sm"
             x-data="{ count: 0 }"
             x-intersect="$el.animate([{ opacity: 0 }, { opacity: 1 }], { duration: 1000 });
                            for(let i = 0; i <= {{ $totalBillboards }}; i++) {
                                setTimeout(() => count = i, i * 20)
                            }">
          <div class="text-4xl font-bold text-indigo-600" x-text="count">0</div>
          <div class="mt-2 text-gray-600">Total Billboards</div>
        </div>

        <div class="bg-white p-8 rounded-lg shadow-sm"
             x-data="{ count: 0 }"
             x-intersect="$el.animate([{ opacity: 0 }, { opacity: 1 }], { duration: 1000 });
                            for(let i = 0; i <= {{ $totalCities }}; i++) {
                                setTimeout(() => count = i, i * 100)
                            }">
          <div class="text-4xl font-bold text-indigo-600" x-text="count">0</div>
          <div class="mt-2 text-gray-600">Cities Covered</div>
        </div>

        <div class="bg-white p-8 rounded-lg shadow-sm"
             x-data="{ count: 0 }"
             x-intersect="$el.animate([{ opacity: 0 }, { opacity: 1 }], { duration: 1000 });
                            for(let i = 0; i <= {{ $yearsOfExperience }}; i++) {
                                setTimeout(() => count = i, i * 100)
                            }">
          <div class="text-4xl font-bold text-indigo-600" x-text="count">0</div>
          <div class="mt-2 text-gray-600">Years of Experience</div>
        </div>

        <div class="bg-white p-8 rounded-lg shadow-sm"
             x-data="{ count: 0 }"
             x-intersect="$el.animate([{ opacity: 0 }, { opacity: 1 }], { duration: 1000 });
                            for(let i = 0; i <= {{ $satisfiedClients }}; i++) {
                                setTimeout(() => count = i, i * 10)
                            }">
          <div class="text-4xl font-bold text-indigo-600" x-text="count">0</div>
          <div class="mt-2 text-gray-600">Satisfied Clients</div>
        </div>
      </div>
    </div>
  </section>

  <!-- Why Choose Us Section -->
  <section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="text-center mb-16">
        <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">
          Why Choose FirstMark
        </h2>
        <p class="mt-4 text-xl text-gray-600">
          Your success is our priority
        </p>
      </div>

      <div class="grid grid-cols-1 gap-8 md:grid-cols-3">
        <div class="relative p-6 bg-white rounded-xl shadow-sm border border-gray-100 hover:shadow-lg transition-shadow duration-300">
          <div class="absolute -top-4 left-6">
            <div class="rounded-full bg-indigo-600 p-3">
              <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
              </svg>
            </div>
          </div>

          <h3 class="mt-8 text-xl font-medium text-gray-900">Strategic Locations</h3>

          <p class="mt-4 text-gray-600">
            Prime billboard positions in high-traffic areas across major cities in Malawi and Zambia.
          </p>
        </div>

        <div class="relative p-6 bg-white rounded-xl shadow-sm border border-gray-100 hover:shadow-lg transition-shadow duration-300">
          <div class="absolute -top-4 left-6">
            <div class="rounded-full bg-indigo-600 p-3">
              <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
              </svg>
            </div>
          </div>
          <h3 class="mt-8 text-xl font-medium text-gray-900">Quality Assurance</h3>
          <p class="mt-4 text-gray-600">
            Regular maintenance and quality checks ensure your advertisements always look their best.
          </p>
        </div>

        <div class="relative p-6 bg-white rounded-xl shadow-sm border border-gray-100 hover:shadow-lg transition-shadow duration-300">
          <div class="absolute -top-4 left-6">
            <div class="rounded-full bg-indigo-600 p-3">
              <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
              </svg>
            </div>
          </div>

          <h3 class="mt-8 text-xl font-medium text-gray-900">Fast Implementation</h3>

          <p class="mt-4 text-gray-600">
            Quick turnaround times from booking to installation, ensuring your campaign launches on schedule.
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- Call to Action Section -->
  <section class="relative py-20 bg-indigo-600">
    <div class="absolute inset-0">
      <img src="{{ asset('images/cta-background.jpg') }}" alt="" class="w-full h-full object-cover opacity-10">
    </div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="relative text-center">
        <h2 class="text-3xl font-extrabold text-white sm:text-4xl">
          Ready to Amplify Your Brand?
        </h2>
        <p class="mt-4 text-xl text-indigo-100">
          Let's discuss how we can help you reach your target audience effectively.
        </p>
        <div class="mt-10">
          <a href="{{ route('contact.index') }}"
             class="inline-flex items-center px-8 py-4 border-2 border-white text-lg font-medium rounded-md text-white hover:bg-white hover:text-indigo-600 transition-colors duration-200">
            Get Started Today
            <svg class="ml-3 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
            </svg>
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- Testimonials Section -->
  <section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="text-center">
        <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">
          What Our Clients Say
        </h2>
      </div>

      @if(count($testimonials) > 0)

        <div class="mt-16">
          <div class="grid grid-cols-1 gap-8 md:grid-cols-3">
            @foreach($testimonials as $testimonial)
              <div class="bg-white p-6 rounded-lg shadow-sm">
                <div class="flex items-center mb-4">
                  <div class="h-12 w-12 rounded-full overflow-hidden">
                    <img src="{{ $testimonial['avatar'] }}" alt="{{ $testimonial['name'] }}" class="h-full w-full object-cover">
                  </div>

                  <div class="ml-4">
                    <h4 class="text-lg font-medium text-gray-900">{{ $testimonial['name'] }}</h4>
                    <p class="text-sm text-gray-600">{{ $testimonial['company'] }}</p>
                  </div>
                </div>
                <p class="text-gray-600 italic">{{ $testimonial['content'] }}</p>
              </div>
            @endforeach
          </div>
        </div>

      @endif
    </div>
  </section>

  <!-- Newsletter Section -->
  <section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="bg-indigo-700 rounded-2xl overflow-hidden shadow-xl">
        <div class="px-6 py-12 sm:px-12 lg:px-16">
          <div class="grid grid-cols-1 gap-8 lg:grid-cols-2 items-center">
            <div>
              <h3 class="text-3xl font-bold text-white">Stay Updated</h3>
              <p class="mt-4 text-lg text-indigo-100">
                Get the latest updates on new locations and special offers.
              </p>
            </div>
            <div>
              <form action="{{ route('newsletter.subscribe') }}" method="POST" class="sm:flex">
                @csrf
                <label for="email-address" class="sr-only">Email address</label>
                <input id="email-address"
                       name="email"
                       type="email"
                       required
                       class="w-full px-5 py-3 border border-transparent placeholder-gray-500 focus:ring-2 focus:ring-white focus:border-white sm:max-w-xs rounded-md"
                       placeholder="Enter your email">
                <div class="mt-3 rounded-md sm:mt-0 sm:ml-3 sm:flex-shrink-0">
                  <button type="submit"
                          class="w-full bg-white border border-transparent rounded-md py-3 px-5 font-medium text-indigo-600 hover:bg-indigo-50 focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-indigo-700">
                    Subscribe
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
