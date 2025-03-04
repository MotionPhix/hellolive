@extends('layouts.app')

@section('title', 'About FirstMark Advertising - Leading Outdoor Advertising in Malawi & Zambia')
@section('meta_description', 'Learn about FirstMark Advertising, the premier outdoor advertising company in Malawi and Zambia. Discover our history, mission, and commitment to exceptional advertising solutions.')

@section('content')
  <!-- Hero Section -->
  <div class="relative bg-indigo-800">
    <div class="absolute inset-0">
      <img class="w-full h-full object-cover" src="{{ asset('images/about-hero.jpg') }}" alt="FirstMark Team">
      <div class="absolute inset-0 bg-indigo-800 mix-blend-multiply"></div>
    </div>

    <div class="relative max-w-7xl mx-auto py-24 px-4 sm:py-32 sm:px-6 lg:px-8">
      <h1 class="text-4xl font-extrabold tracking-tight text-white sm:text-5xl lg:text-6xl">About FirstMark</h1>
      <p class="mt-6 max-w-3xl text-xl text-indigo-100">
        Transforming the outdoor advertising landscape in Southern Africa since 2010
      </p>
    </div>
  </div>

  <!-- Mission & Vision Section -->
  <section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="grid grid-cols-1 gap-8 lg:grid-cols-2">
        <div class="relative">
          <div class="h-64 lg:absolute lg:h-full lg:w-full lg:inset-y-0 lg:right-0 lg:transform lg:translate-x-1/3">
            <img class="object-cover w-full h-full rounded-lg shadow-xl"
                 src="{{ asset('images/mission.jpg') }}"
                 alt="FirstMark Mission">
          </div>
        </div>
        <div class="lg:pr-8">
          <div class="max-w-prose mx-auto lg:max-w-lg lg:ml-auto lg:mr-0">
            <h2 class="text-3xl font-bold text-gray-900 sm:text-4xl">
              Our Mission
            </h2>
            <p class="mt-4 text-lg text-gray-600">
              To provide innovative and impactful outdoor advertising solutions that help brands connect with their audience effectively across Southern Africa.
            </p>

            <h2 class="mt-8 text-3xl font-bold text-gray-900 sm:text-4xl">
              Our Vision
            </h2>
            <p class="mt-4 text-lg text-gray-600">
              To be the leading outdoor advertising company in Africa, known for excellence, innovation, and strategic advertising solutions.
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Values Section -->
  <section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="text-center">
        <h2 class="text-3xl font-bold text-gray-900 sm:text-4xl">Our Core Values</h2>
        <p class="mt-4 text-xl text-gray-600">The principles that guide everything we do</p>
      </div>

      <div class="mt-16 grid grid-cols-1 gap-8 md:grid-cols-3">
        <div class="relative group">
          <div class="absolute -inset-0.5 bg-gradient-to-r from-indigo-600 to-blue-500 rounded-lg blur opacity-25 group-hover:opacity-100 transition duration-1000 group-hover:duration-200"></div>
          <div class="relative px-6 py-8 bg-white rounded-lg shadow-lg">
            <div class="w-12 h-12 mx-auto bg-indigo-600 rounded-xl flex items-center justify-center">
              <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
              </svg>
            </div>
            <h3 class="mt-6 text-xl font-medium text-gray-900 text-center">Excellence</h3>
            <p class="mt-4 text-gray-600 text-center">
              We strive for excellence in every aspect of our service, from billboard maintenance to client relationships.
            </p>
          </div>
        </div>

        <div class="relative group">
          <div class="absolute -inset-0.5 bg-gradient-to-r from-indigo-600 to-blue-500 rounded-lg blur opacity-25 group-hover:opacity-100 transition duration-1000 group-hover:duration-200"></div>
          <div class="relative px-6 py-8 bg-white rounded-lg shadow-lg">
            <div class="w-12 h-12 mx-auto bg-indigo-600 rounded-xl flex items-center justify-center">
              <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
              </svg>
            </div>
            <h3 class="mt-6 text-xl font-medium text-gray-900 text-center">Innovation</h3>
            <p class="mt-4 text-gray-600 text-center">
              We continuously innovate to provide cutting-edge advertising solutions that deliver results.
            </p>
          </div>
        </div>

        <div class="relative group">
          <div class="absolute -inset-0.5 bg-gradient-to-r from-indigo-600 to-blue-500 rounded-lg blur opacity-25 group-hover:opacity-100 transition duration-1000 group-hover:duration-200"></div>
          <div class="relative px-6 py-8 bg-white rounded-lg shadow-lg">
            <div class="w-12 h-12 mx-auto bg-indigo-600 rounded-xl flex items-center justify-center">
              <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
              </svg>
            </div>
            <h3 class="mt-6 text-xl font-medium text-gray-900 text-center">Partnership</h3>
            <p class="mt-4 text-gray-600 text-center">
              We build lasting partnerships with our clients, helping them achieve their advertising goals.
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Team Section -->
  <section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="text-center">
        <h2 class="text-3xl font-bold text-gray-900 sm:text-4xl">Our Leadership Team</h2>
        <p class="mt-4 text-xl text-gray-600">Meet the people driving our success</p>
      </div>

      <div class="mt-16 grid grid-cols-1 gap-12 sm:grid-cols-2 lg:grid-cols-3">
        @foreach($teamMembers as $member)
          <div class="group">
            <div class="relative overflow-hidden rounded-lg">
              <img class="w-full h-96 object-cover transition-transform duration-300 group-hover:scale-110"
                   src="{{ $member['image'] }}"
                   alt="{{ $member['name'] }}">
              <div class="absolute inset-0 bg-gradient-to-t from-black via-black/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                <div class="absolute bottom-0 left-0 right-0 p-6">
                  <div class="flex space-x-4 justify-center">
                    <a href="{{ $member['linkedin'] }}" class="text-white hover:text-indigo-400" target="_blank" rel="noopener">
                      <span class="sr-only">LinkedIn</span>
                      <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/>
                      </svg>
                    </a>
                  </div>
                </div>
              </div>
            </div>
            <div class="mt-4 text-center">
              <h3 class="text-lg font-medium text-gray-900">{{ $member['name'] }}</h3>
              <p class="text-sm text-gray-600">{{ $member['position'] }}</p>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>

  <!-- Coverage Map Section -->
  <section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="text-center mb-12">
        <h2 class="text-3xl font-bold text-gray-900 sm:text-4xl">Our Coverage</h2>
        <p class="mt-4 text-xl text-gray-600">Strategic presence across Southern Africa</p>
      </div>

      <div class="relative h-[600px] rounded-lg overflow-hidden shadow-lg">
        <div id="coverage-map" class="absolute inset-0"></div>
      </div>
    </div>
  </section>

  <!-- Timeline Section -->
  <section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="text-center mb-12">
        <h2 class="text-3xl font-bold text-gray-900 sm:text-4xl">Our Journey</h2>
        <p class="mt-4 text-xl text-gray-600">From humble beginnings to industry leadership</p>
      </div>

      <div class="relative">
        <!-- Timeline line -->
        <div class="absolute left-1/2 transform -translate-x-px h-full w-0.5 bg-gray-200"></div>

        <div class="space-y-12">
          @foreach($milestones as $milestone)
            <div class="relative group">
              <div class="flex items-center">
                <div class="flex-1 text-right pr-8">
                  <h3 class="text-lg font-medium text-gray-900">{{ $milestone['year'] }}</h3>
                </div>
                <div class="w-4 h-4 rounded-full bg-indigo-600 relative z-10">
                  <div class="w-4 h-4 rounded-full bg-indigo-600 animate-ping absolute"></div>
                </div>
                <div class="flex-1 pl-8">
                  <h4 class="text-lg font-medium text-gray-900">{{ $milestone['title'] }}</h4>
                  <p class="mt-2 text-gray-600">{{ $milestone['description'] }}</p>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </section>

  @push('scripts')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        const map = L.map('coverage-map').setView([-13.254308, 34.301525], 5);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
          attribution: '© OpenStreetMap contributors'
        }).addTo(map);

        // Add markers for major cities
        const cities = @json($coverageCities);

        cities.forEach(city => {
          L.marker([city.lat, city.lng])
            .addTo(map)
            .bindPopup(`<b>${city.name}</b><br>${city.country}`);
        });
      });
    </script>
  @endpush
@endsection
