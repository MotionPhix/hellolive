@extends('layouts.app')

@section('title', $billboard->name)
@section('meta_description', "View details about {$billboard->name} billboard located in {$billboard->city}, {$billboard->country}. Dimensions: {$billboard->dimensions['width']}m x {$billboard->dimensions['height']}m")

@section('content')
{{--  <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">--}}
{{--    <div class="px-4 py-6 sm:px-0">--}}
{{--      <!-- Billboard Details -->--}}
{{--      <div class="bg-white shadow overflow-hidden sm:rounded-lg">--}}
{{--        <div class="px-4 py-5 sm:px-6">--}}
{{--          <h1 class="text-2xl font-bold text-gray-900">{{ $billboard->name }}</h1>--}}
{{--          <p class="mt-1 max-w-2xl text-sm text-gray-500">{{ $billboard->location }}</p>--}}
{{--        </div>--}}

{{--        <!-- Image Gallery -->--}}
{{--        <div class="border-t border-gray-200">--}}
{{--          <div x-data="{ activeSlide: 0 }" class="relative">--}}
{{--            <div class="relative h-96">--}}
{{--              @foreach($billboard->getMedia('billboard_images') as $index => $media)--}}
{{--                <div x-show="activeSlide === {{ $index }}"--}}
{{--                     x-transition:enter="transition ease-out duration-300"--}}
{{--                     x-transition:enter-start="opacity-0 transform scale-95"--}}
{{--                     x-transition:enter-end="opacity-100 transform scale-100"--}}
{{--                     class="absolute inset-0">--}}
{{--                  <img src="{{ $media->getUrl() }}"--}}
{{--                       alt="{{ $billboard->name }}"--}}
{{--                       class="w-full h-full object-cover">--}}
{{--                </div>--}}
{{--              @endforeach--}}
{{--            </div>--}}

{{--            <!-- Navigation arrows -->--}}
{{--            <button @click="activeSlide = activeSlide === 0 ? {{ $billboard->getMedia('billboard_images')->count() - 1 }} : activeSlide - 1"--}}
{{--                    class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-black bg-opacity-50 text-white p-2 rounded-r">--}}
{{--              <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">--}}
{{--                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />--}}
{{--              </svg>--}}
{{--            </button>--}}
{{--            <button @click="activeSlide = activeSlide === {{ $billboard->getMedia('billboard_images')->count() - 1 }} ? 0 : activeSlide + 1"--}}
{{--                    class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-black bg-opacity-50 text-white p-2 rounded-l">--}}
{{--              <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">--}}
{{--                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />--}}
{{--              </svg>--}}
{{--            </button>--}}

{{--            <!-- Dots indicator -->--}}
{{--            <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 flex space-x-2">--}}
{{--              @foreach($billboard->getMedia('billboard_images') as $index => $media)--}}
{{--                <button @click="activeSlide = {{ $index }}"--}}
{{--                        :class="{'bg-white': activeSlide === {{ $index }}, 'bg-gray-400': activeSlide !== {{ $index }}}"--}}
{{--                        class="w-2 h-2 rounded-full transition-colors duration-200"></button>--}}
{{--              @endforeach--}}
{{--            </div>--}}
{{--          </div>--}}
{{--        </div>--}}

{{--        <!-- Billboard Information -->--}}
{{--        <div class="border-t border-gray-200 px-4 py-5 sm:px-6">--}}
{{--          <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">--}}
{{--            <div class="sm:col-span-1">--}}
{{--              <dt class="text-sm font-medium text-gray-500">Location</dt>--}}
{{--              <dd class="mt-1 text-sm text-gray-900">{{ $billboard->location }}</dd>--}}
{{--            </div>--}}

{{--            <div class="sm:col-span-1">--}}
{{--              <dt class="text-sm font-medium text-gray-500">City</dt>--}}
{{--              <dd class="mt-1 text-sm text-gray-900">{{ $billboard->city }}, {{ $billboard->country }}</dd>--}}
{{--            </div>--}}

{{--            <div class="sm:col-span-1">--}}
{{--              <dt class="text-sm font-medium text-gray-500">Dimensions</dt>--}}
{{--              <dd class="mt-1 text-sm text-gray-900">{{ $billboard->dimensions['width'] }}m × {{ $billboard->dimensions['height'] }}m</dd>--}}
{{--            </div>--}}

{{--            <div class="sm:col-span-1">--}}
{{--              <dt class="text-sm font-medium text-gray-500">Monthly Rate</dt>--}}
{{--              <dd class="mt-1 text-sm text-gray-900">${{ number_format($billboard->monthly_rate, 2) }}</dd>--}}
{{--            </div>--}}

{{--            <div class="sm:col-span-1">--}}
{{--              <dt class="text-sm font-medium text-gray-500">Status</dt>--}}
{{--              <dd class="mt-1 text-sm text-gray-900">--}}
{{--                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium--}}
{{--                  {{ $billboard->status === 'available' ? 'bg-green-100 text-green-800' :--}}
{{--                     ($billboard->status === 'occupied' ? 'bg-red-100 text-red-800' : 'bg-yellow-100 text-yellow-800') }}">--}}
{{--                  {{ ucfirst($billboard->status) }}--}}
{{--                </span>--}}
{{--              </dd>--}}
{{--            </div>--}}

{{--            <div class="sm:col-span-2">--}}
{{--              <dt class="text-sm font-medium text-gray-500">Description</dt>--}}
{{--              <dd class="mt-1 text-sm text-gray-900">{{ $billboard->description }}</dd>--}}
{{--            </div>--}}

{{--            <!-- OpenStreetMap -->--}}
{{--            <div class="sm:col-span-2">--}}
{{--              <dt class="text-sm font-medium text-gray-500 mb-2">Location Map</dt>--}}
{{--              <dd class="mt-1">--}}
{{--                <div id="map" class="h-96 rounded-lg"></div>--}}
{{--              </dd>--}}
{{--            </div>--}}
{{--          </dl>--}}
{{--        </div>--}}

{{--        <!-- Contact / Inquiry Section -->--}}
{{--        <div class="border-t border-gray-200 px-4 py-5 sm:px-6">--}}
{{--          <div class="flex justify-between items-center">--}}
{{--            <div>--}}
{{--              <h3 class="text-lg font-medium text-gray-900">Interested in this billboard?</h3>--}}
{{--              <p class="mt-1 text-sm text-gray-500">Contact us to learn more about availability and pricing.</p>--}}
{{--            </div>--}}

{{--            <a href="{{ route('contact.index', ['billboard' => $billboard->id]) }}"--}}
{{--               class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">--}}
{{--              Make an Inquiry--}}
{{--            </a>--}}
{{--          </div>--}}
{{--        </div>--}}
{{--      </div>--}}
{{--    </div>--}}
{{--  </div>--}}

  <billboard-show
    :billboard="{{
      json_encode([
        'id' => $billboard->id,
        'name' => $billboard->name,
        'location' => $billboard->location,
        'city' => $billboard->city,
        'state' => $billboard->state,
        'country' => $billboard->country,
        'status' => $billboard->status,
        'description' => $billboard->description,
        'dimensions' => $billboard->dimensions,
        'latitude' => $billboard->latitude,
        'longitude' => $billboard->longitude,
        'monthly_rate' => $billboard->monthly_rate,
        'type' => $billboard->type,
        'is_available' => $billboard->is_available,
        'media' => $billboard->media->map(function($media) {
          return [
            'id' => $media->id,
            'preview_url' => $media->preview_url,
            'original_url' => $media->original_url,
          ];
        })
      ], JSON_PRETTY_PRINT)
    }}"
    :related-billboards="{{ json_encode($relatedBillboards) }}"
  />
@endsection

