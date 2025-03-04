{{--@extends('layouts.app-layout')--}}

{{--@section('content')--}}
{{--  <section class="py-16">--}}
{{--    <div class="container mx-auto px-4">--}}
{{--      <h2 class="text-3xl font-bold text-center">Available Billboards</h2>--}}

{{--      --}}{{-- Filter Section --}}
{{--      <div class="mt-6 flex flex-wrap justify-center gap-4">--}}
{{--        <select id="country-filter" class="bg-gray-200 dark:bg-gray-700 text-gray-900 dark:text-white rounded-md px-4 py-2" onchange="applyFilters()">--}}
{{--          <option value="all">All Countries</option>--}}
{{--          @foreach ($countries as $country)--}}
{{--            <option value="{{ $country->code }}" {{ request('country') == $country->code ? 'selected' : '' }}>{{ $country->name }}</option>--}}
{{--          @endforeach--}}
{{--        </select>--}}

{{--        <input type="text" id="search" placeholder="Search by location" class="bg-gray-200 dark:bg-gray-700 text-gray-900 dark:text-white rounded-md px-4 py-2">--}}
{{--      </div>--}}

{{--      --}}{{-- Billboard Grid --}}
{{--      <div class="mt-8 grid md:grid-cols-3 gap-8">--}}
{{--        @foreach ($billboards as $billboard)--}}
{{--          <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-hidden">--}}
{{--            <img src="{{ asset('storage/' . $billboard->image) }}" alt="{{ $billboard->title }}" class="w-full h-64 object-cover">--}}
{{--            <div class="p-4">--}}
{{--              <h3 class="text-xl font-semibold">{{ $billboard->title }}</h3>--}}
{{--              <p class="text-gray-700 dark:text-gray-300">{{ $billboard->location }} - {{ $billboard->country->name }}</p>--}}
{{--              <a href="{{ route('billboards.show', $billboard) }}" class="mt-4 inline-block bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg">View Details</a>--}}
{{--            </div>--}}
{{--          </div>--}}
{{--        @endforeach--}}
{{--      </div>--}}

{{--      --}}{{-- Pagination --}}
{{--      <div class="mt-8">--}}
{{--        {{ $billboards->links() }}--}}
{{--      </div>--}}
{{--    </div>--}}
{{--  </section>--}}

{{--  <script>--}}
{{--    function applyFilters() {--}}
{{--      const country = document.getElementById('country-filter').value;--}}
{{--      const search = document.getElementById('search').value;--}}
{{--      window.location.href = `?country=${country}&search=${search}`;--}}
{{--    }--}}
{{--  </script>--}}
{{--@endsection--}}

{{--@extends('layouts.app')--}}

{{--@section('content')--}}
{{--  <section class="py-16">--}}
{{--    <div class="container mx-auto px-4">--}}
{{--      <h2 class="text-3xl font-bold text-center text-gray-900 dark:text-gray-100">Available Billboards</h2>--}}

{{--      --}}{{-- Filter Section --}}
{{--      <div class="mt-6 flex flex-wrap justify-center gap-4">--}}
{{--        <select id="country-filter" class="bg-gray-200 dark:bg-gray-700 text-gray-900 dark:text-white rounded-md px-4 py-2 focus:ring-2 focus:ring-blue-500 transition" onchange="applyFilters()">--}}
{{--          <option value="all">All Countries</option>--}}
{{--          @foreach ($countries as $country)--}}
{{--            <option value="{{ $country->code }}" {{ request('country') == $country->code ? 'selected' : '' }}>{{ $country->name }}</option>--}}
{{--          @endforeach--}}
{{--        </select>--}}

{{--        <input type="text" id="search" placeholder="Search by location" class="bg-gray-200 dark:bg-gray-700 text-gray-900 dark:text-white rounded-md px-4 py-2 focus:ring-2 focus:ring-blue-500 transition w-64">--}}
{{--      </div>--}}

{{--      --}}{{-- Billboard Grid --}}
{{--      <div class="mt-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">--}}
{{--        @foreach ($billboards as $billboard)--}}
{{--          <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-hidden transform transition hover:scale-105 hover:shadow-xl">--}}
{{--            <img src="{{ asset('storage/' . $billboard->image) }}" alt="{{ $billboard->title }}" class="w-full h-64 object-cover">--}}
{{--            <div class="p-4">--}}
{{--              <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100">{{ $billboard->title }}</h3>--}}
{{--              <p class="text-gray-700 dark:text-gray-300">{{ $billboard->location }} - {{ $billboard->country->name }}</p>--}}
{{--              <a href="{{ route('billboards.show', $billboard) }}" class="mt-4 inline-block bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg transition">View Details</a>--}}
{{--            </div>--}}
{{--          </div>--}}
{{--        @endforeach--}}
{{--      </div>--}}

{{--      --}}{{-- Pagination --}}
{{--      <div class="mt-8 flex justify-center">--}}
{{--        {{ $billboards->links() }}--}}
{{--      </div>--}}
{{--    </div>--}}
{{--  </section>--}}

{{--  <script>--}}
{{--    function applyFilters() {--}}
{{--      const country = document.getElementById('country-filter').value;--}}
{{--      const search = document.getElementById('search').value;--}}
{{--      window.location.href = `?country=${country}&search=${search}`;--}}
{{--    }--}}
{{--  </script>--}}
{{--@endsection--}}

{{--@extends('layouts.app')--}}

{{--@section('title', $billboard->name . ' - ' . $billboard->city . ', ' . $billboard->country->name)--}}
{{--@section('description', Str::limit($billboard->description, 160))--}}

{{--@section('content')--}}
{{--  <section class="py-16">--}}
{{--    <div class="container mx-auto px-4">--}}
{{--      <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">--}}
{{--        --}}{{-- Billboard Image Gallery --}}
{{--        <div>--}}
{{--          @if ($billboard->getFirstMediaUrl('billboards'))--}}
{{--            <img src="{{ $billboard->getFirstMediaUrl('billboards') }}" alt="{{ $billboard->name }}" class="w-full h-auto rounded-lg shadow-lg object-cover">--}}
{{--          @endif--}}
{{--        </div>--}}

{{--        --}}{{-- Billboard Details --}}
{{--        <div class="text-gray-900 dark:text-gray-100 space-y-4">--}}
{{--          <h1 class="text-5xl font-extrabold">{{ $billboard->name }}</h1>--}}
{{--          <p class="text-lg text-gray-700 dark:text-gray-300 font-medium">{{ $billboard->location }}, {{ $billboard->city }}, {{ $billboard->state }} - {{ $billboard->country->name }}</p>--}}

{{--          <div class="grid grid-cols-2 gap-4">--}}
{{--            <p class="bg-gray-100 dark:bg-gray-800 p-4 rounded-lg text-gray-700 dark:text-gray-300"><strong>Status:</strong> {{ ucfirst($billboard->status) }}</p>--}}
{{--            <p class="bg-gray-100 dark:bg-gray-800 p-4 rounded-lg text-gray-700 dark:text-gray-300"><strong>Dimensions:</strong> {{ $billboard->dimensions }}</p>--}}
{{--            <p class="bg-gray-100 dark:bg-gray-800 p-4 rounded-lg text-gray-700 dark:text-gray-300"><strong>Monthly Rate:</strong> ${{ number_format($billboard->monthly_rate, 2) }}</p>--}}
{{--          </div>--}}

{{--          <p class="text-gray-700 dark:text-gray-300 leading-relaxed">{{ $billboard->description }}</p>--}}

{{--          --}}{{-- Inquiry Button --}}
{{--          <a href="{{ route('inquiry.form', $billboard) }}" class="mt-6 inline-block bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 px-8 rounded-lg transition shadow-lg">Inquire Now</a>--}}
{{--        </div>--}}
{{--      </div>--}}

{{--      --}}{{-- Map Section --}}
{{--      <div class="mt-16">--}}
{{--        <h2 class="text-3xl font-bold text-gray-900 dark:text-gray-100 mb-4">Billboard Location</h2>--}}
{{--        <div id="map" class="w-full h-96 rounded-lg shadow-lg"></div>--}}
{{--      </div>--}}
{{--    </div>--}}
{{--  </section>--}}

{{--  <script>--}}
{{--    function initMap() {--}}
{{--      var map = L.map('map').setView([{{ $billboard->latitude }}, {{ $billboard->longitude }}], 15);--}}
{{--      L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {--}}
{{--        attribution: '&copy; OpenStreetMap contributors'--}}
{{--      }).addTo(map);--}}
{{--      L.marker([{{ $billboard->latitude }}, {{ $billboard->longitude }}]).addTo(map)--}}
{{--        .bindPopup("{{ $billboard->name }}")--}}
{{--        .openPopup();--}}
{{--    }--}}
{{--    document.addEventListener("DOMContentLoaded", initMap);--}}
{{--  </script>--}}
{{--  <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>--}}
{{--@endsection--}}

@extends('layouts.app')

@section('title', 'Available Billboards')
@section('meta_description', 'Explore our extensive network of premium billboard locations across Malawi and Zambia. Find the perfect outdoor advertising space for your brand.')

@section('content')
  <div class="bg-white">
    <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
      <!-- Filters Section -->
      <div x-data="{
            filtersOpen: false,
            filters: {
                country: '',
                city: '',
                status: '',
                priceRange: '',
            }
        }" class="relative z-10">
        <div class="flex items-center justify-between mb-6">
          <h1 class="text-3xl font-bold text-gray-900">Billboards</h1>
          <button @click="filtersOpen = !filtersOpen"
                  class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50">
            <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
            </svg>
            Filters
          </button>
        </div>

        <!-- Filters Panel -->
        <div x-show="filtersOpen"
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 transform -translate-y-2"
             x-transition:enter-end="opacity-100 transform translate-y-0"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 transform translate-y-0"
             x-transition:leave-end="opacity-0 transform -translate-y-2"
             class="bg-white shadow-lg rounded-lg p-6 mb-6">
          <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">
            <!-- Country Filter -->
            <div>
              <label class="block text-sm font-medium text-gray-700">Country</label>
              <select x-model="filters.country"
                      class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                <option value="">All Countries</option>
                @foreach($countries as $country)
                  <option value="{{ $country }}">{{ $country }}</option>
                @endforeach
              </select>
            </div>

            <!-- City Filter -->
            <div>
              <label class="block text-sm font-medium text-gray-700">City</label>
              <select x-model="filters.city"
                      class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                <option value="">All Cities</option>
                @foreach($cities as $city)
                  <option value="{{ $city }}">{{ $city }}</option>
                @endforeach
              </select>
            </div>

            <!-- Status Filter -->
            <div>
              <label class="block text-sm font-medium text-gray-700">Status</label>
              <select x-model="filters.status"
                      class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                <option value="">All Status</option>
                <option value="available">Available</option>
                <option value="occupied">Occupied</option>
                <option value="maintenance">Under Maintenance</option>
              </select>
            </div>

            <!-- Price Range Filter -->
            <div>
              <label class="block text-sm font-medium text-gray-700">Price Range</label>
              <select x-model="filters.priceRange"
                      class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                <option value="">All Prices</option>
                <option value="0-1000">$0 - $1,000</option>
                <option value="1000-2000">$1,000 - $2,000</option>
                <option value="2000-5000">$2,000 - $5,000</option>
                <option value="5000+">$5,000+</option>
              </select>
            </div>
          </div>
        </div>
      </div>

      <!-- Billboard Grid -->
      <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
        @foreach($billboards as $billboard)
          <div class="group relative bg-white rounded-lg shadow-lg overflow-hidden">
            <div class="relative h-80">
              <img src="{{ $billboard->getFirstMediaUrl('billboard_images') }}"
                   alt="{{ $billboard->name }}"
                   class="w-full h-full object-cover group-hover:opacity-75 transition-opacity duration-300">
              <div class="absolute top-0 right-0 mt-4 mr-4">
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                            {{ $billboard->status === 'available' ? 'bg-green-100 text-green-800' :
                               ($billboard->status === 'occupied' ? 'bg-red-100 text-red-800' : 'bg-yellow-100 text-yellow-800') }}">
                            {{ ucfirst($billboard->status) }}
                        </span>
              </div>
            </div>
            <div class="p-6">
              <h3 class="text-lg font-medium text-gray-900">
                <a href="{{ route('billboards.show', $billboard) }}" class="hover:underline">
                  {{ $billboard->name }}
                </a>
              </h3>
              <p class="mt-2 text-sm text-gray-500">{{ $billboard->location }}</p>
              <div class="mt-4 flex items-center justify-between">
                <div>
                  <p class="text-sm text-gray-500">Dimensions</p>
                  <p class="text-sm font-medium text-gray-900">{{ $billboard->dimensions['width'] }}m × {{ $billboard->dimensions['height'] }}m</p>
                </div>
                <div class="text-right">
                  <p class="text-sm text-gray-500">Monthly Rate</p>
                  <p class="text-lg font-bold text-indigo-600">${{ number_format($billboard->monthly_rate, 2) }}</p>
                </div>
              </div>
              <div class="mt-4">
                <a href="{{ route('billboards.show', $billboard) }}"
                   class="block w-full text-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700">
                  View Details
                </a>
              </div>
            </div>
          </div>
        @endforeach
      </div>

      <!-- Pagination -->
      <div class="mt-8">
        {{ $billboards->links() }}
      </div>
    </div>
  </div>
@endsection

@push('scripts')
  <script>
    document.addEventListener('alpine:init', () => {
      Alpine.data('billboardFilters', () => ({
        async applyFilters() {
          const queryParams = new URLSearchParams(this.filters).toString();
          window.location.search = queryParams;
        }
      }))
    })
  </script>
@endpush


