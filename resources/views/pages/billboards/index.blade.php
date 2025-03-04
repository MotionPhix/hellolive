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

@extends('layouts.app')

@section('title', $billboard->name . ' - ' . $billboard->city . ', ' . $billboard->country->name)
@section('description', Str::limit($billboard->description, 160))

@section('content')
  <section class="py-16">
    <div class="container mx-auto px-4">
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
        {{-- Billboard Image Gallery --}}
        <div>
          @if ($billboard->getFirstMediaUrl('billboards'))
            <img src="{{ $billboard->getFirstMediaUrl('billboards') }}" alt="{{ $billboard->name }}" class="w-full h-auto rounded-lg shadow-lg object-cover">
          @endif
        </div>

        {{-- Billboard Details --}}
        <div class="text-gray-900 dark:text-gray-100 space-y-4">
          <h1 class="text-5xl font-extrabold">{{ $billboard->name }}</h1>
          <p class="text-lg text-gray-700 dark:text-gray-300 font-medium">{{ $billboard->location }}, {{ $billboard->city }}, {{ $billboard->state }} - {{ $billboard->country->name }}</p>

          <div class="grid grid-cols-2 gap-4">
            <p class="bg-gray-100 dark:bg-gray-800 p-4 rounded-lg text-gray-700 dark:text-gray-300"><strong>Status:</strong> {{ ucfirst($billboard->status) }}</p>
            <p class="bg-gray-100 dark:bg-gray-800 p-4 rounded-lg text-gray-700 dark:text-gray-300"><strong>Dimensions:</strong> {{ $billboard->dimensions }}</p>
            <p class="bg-gray-100 dark:bg-gray-800 p-4 rounded-lg text-gray-700 dark:text-gray-300"><strong>Monthly Rate:</strong> ${{ number_format($billboard->monthly_rate, 2) }}</p>
          </div>

          <p class="text-gray-700 dark:text-gray-300 leading-relaxed">{{ $billboard->description }}</p>

          {{-- Inquiry Button --}}
          <a href="{{ route('inquiry.form', $billboard) }}" class="mt-6 inline-block bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 px-8 rounded-lg transition shadow-lg">Inquire Now</a>
        </div>
      </div>

      {{-- Map Section --}}
      <div class="mt-16">
        <h2 class="text-3xl font-bold text-gray-900 dark:text-gray-100 mb-4">Billboard Location</h2>
        <div id="map" class="w-full h-96 rounded-lg shadow-lg"></div>
      </div>
    </div>
  </section>

  <script>
    function initMap() {
      var map = L.map('map').setView([{{ $billboard->latitude }}, {{ $billboard->longitude }}], 15);
      L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; OpenStreetMap contributors'
      }).addTo(map);
      L.marker([{{ $billboard->latitude }}, {{ $billboard->longitude }}]).addTo(map)
        .bindPopup("{{ $billboard->name }}")
        .openPopup();
    }
    document.addEventListener("DOMContentLoaded", initMap);
  </script>
  <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
@endsection


