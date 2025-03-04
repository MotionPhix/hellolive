<!DOCTYPE html>
<html
  lang="{{ str_replace('_', '-', app()->getLocale()) }}"
  x-data
  :class="{ 'dark': $store.darkMode.on }">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="description"
        content="@yield('meta_description', 'Premier outdoor advertising company operating in Malawi and Zambia. Find the perfect billboard location for your brand.')">
  <meta name="keywords"
        content="@yield('meta_keywords', 'billboard advertising, outdoor advertising, advertising Malawi, advertising Zambia, billboard locations, FirstMark advertising')">

  <!-- Open Graph / Facebook -->
  <meta property="og:type" content="website">
  <meta property="og:url" content="{{ url()->current() }}">
  <meta property="og:title" content="@yield('title') - FirstMark Advertising">
  <meta property="og:description"
        content="@yield('meta_description', 'Premier outdoor advertising company operating in Malawi and Zambia')">
  <meta property="og:image" content="@yield('meta_image', asset('images/og-image.jpg'))">

  <!-- Twitter -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:url" content="{{ url()->current() }}">
  <meta name="twitter:title" content="@yield('title') - FirstMark Advertising">
  <meta name="twitter:description" content="@yield('meta_description')">
  <meta name="twitter:image" content="@yield('meta_image', asset('images/og-image.jpg'))">

  <!-- Canonical URL -->
  <link rel="canonical" href="{{ url()->current() }}"/>

  <title>@yield('title') - FirstMark Advertising</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link href="https://fonts.bunny.net/css?family=playfair-display:700,900" rel="stylesheet"/>

  <!-- Styles -->
  @vite(['resources/css/app.css', 'resources/js/app.js'])

  <!-- Schema.org markup -->
  <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Organization",
        "name": "FirstMark Advertising",
        "url": "{{ url('/') }}",
            "logo": "{{ asset('images/logo.png') }}",
            "contactPoint": {
                "@type": "ContactPoint",
                "telephone": "+265-999-999-999",
                "contactType": "customer service",
                "areaServed": ["MW", "ZM"],
                "availableLanguage": ["en"]
            },
            "sameAs": [
                "https://facebook.com/firstmarkadvertising",
                "https://instagram.com/firstmarkadvertising"
            ]
        }
  </script>

  <!-- Scripts -->
  @stack('scripts')
</head>
<body
  x-data="{
        mobileMenuOpen: false,
        countryDropdownOpen: false,
        selectedCountry: localStorage.getItem('selectedCountry') || 'all'
    }"
  x-init="$watch('$store.darkMode.on', value => {
        if (value === true) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    })"
  class="min-h-screen bg-white dark:bg-gray-900 font-sans antialiased">

<!-- Skip to main content -->
<a href="#main-content"
   class="sr-only focus:not-sr-only focus:absolute focus:top-4 focus:left-4 focus:z-50 focus:px-4 focus:py-2 focus:bg-indigo-600 focus:text-white focus:rounded-md">
  Skip to main content
</a>

<!-- Navigation -->
@include('layouts.navigation')

<!-- Page Content -->
<main id="main-content">
  @if (isset($header))
    <header class="bg-white dark:bg-gray-800 shadow">
      <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        {{ $header }}
      </div>
    </header>
  @endif

  @yield('content')
</main>

<!-- Footer -->
@include('layouts.footer')

<!-- Notification -->
<div x-data="{ show: false, message: '', type: 'success' }"
     x-on:notification.window="
            show = true;
            message = $event.detail.message;
            type = $event.detail.type || 'success';
            setTimeout(() => show = false, 3000)
         "
     x-show="show"
     x-transition
     class="fixed bottom-4 right-4 z-50"
     role="alert">
  <div :class="{
            'bg-green-500': type === 'success',
            'bg-red-500': type === 'error',
            'bg-blue-500': type === 'info',
            'bg-yellow-500': type === 'warning'
        }" class="rounded-lg shadow-lg p-4 text-white">
    <p x-text="message"></p>
  </div>
</div>
</body>
</html>
