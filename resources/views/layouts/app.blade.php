<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
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

  <title>@yield('title') - FirstMark Advertising</title>

  @vite(['resources/css/app.css'])

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=playfair-display:700,900" rel="stylesheet"/>
</head>
<body
  x-data="{
    mobileMenuOpen: false,
    countryDropdownOpen: false,
    selectedCountry: localStorage.getItem('selectedCountry') || 'all'
   }"
  class="min-h-screen font-sans antialiased">

  <!-- Navigation -->
  @include('layouts.navigation')

  <!-- Page Content -->
  <main>
    @yield('content')
  </main>

  <!-- Footer with Structured Data -->
  @include('layouts.footer')

  @stack('scripts')
</body>
</html>
