<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="@yield('meta_description', 'Premier outdoor advertising company operating in Malawi and Zambia. Find the perfect billboard location for your brand.')">
  <meta name="keywords" content="@yield('meta_keywords', 'billboard advertising, outdoor advertising, advertising Malawi, advertising Zambia, billboard locations, FirstMark advertising')">

  <!-- Open Graph / Facebook -->
  <meta property="og:type" content="website">
  <meta property="og:url" content="{{ url()->current() }}">
  <meta property="og:title" content="@yield('title') - FirstMark Advertising">
  <meta property="og:description" content="@yield('meta_description', 'Premier outdoor advertising company operating in Malawi and Zambia')">
  <meta property="og:image" content="@yield('meta_image', asset('images/og-image.jpg'))">

  <!-- Twitter -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:url" content="{{ url()->current() }}">
  <meta name="twitter:title" content="@yield('title') - FirstMark Advertising">
  <meta name="twitter:description" content="@yield('meta_description')">
  <meta name="twitter:image" content="@yield('meta_image', asset('images/og-image.jpg'))">

  <!-- Canonical URL -->
  <link rel="canonical" href="{{ url()->current() }}" />

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
  <link href="https://fonts.bunny.net/css?family=playfair-display:700,900" rel="stylesheet" />
</head>
<body class="font-sans antialiased">
<div x-data="{
        mobileMenuOpen: false,
        countryDropdownOpen: false,
        selectedCountry: localStorage.getItem('selectedCountry') || 'all'
    }" class="min-h-screen bg-gray-100">
  <!-- Navigation -->
  <nav class="bg-white border-b border-gray-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex justify-between h-16">
        <!-- Logo -->
        <div class="flex-shrink-0 flex items-center">
          <a href="{{ route('home') }}">
            <img class="h-8 w-auto" src="/images/logo.svg" alt="FirstMark">
          </a>
        </div>

        <!-- Desktop Menu -->
        <div class="hidden sm:ml-6 sm:flex sm:items-center space-x-8">
          <a href="{{ route('home') }}" class="px-3 py-2 rounded-md text-sm font-medium {{ request()->routeIs('home') ? 'text-indigo-600' : 'text-gray-500 hover:text-gray-700' }}">
            Home
          </a>

          <!-- Country Selector Dropdown -->
          <div class="relative" x-data="{
              countries: {{ json_encode(\App\Models\Billboard::select('country')->distinct()->get()->pluck('country')) }},
              async changeCountry(country) {
                this.selectedCountry = country;
                localStorage.setItem('selectedCountry', country);
                await $dispatch('country-changed', { country });
              }
            }">
            <button @click="countryDropdownOpen = !countryDropdownOpen" class="inline-flex items-center px-3 py-2 border border-gray-300 text-sm leading-4 font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
              <span x-text="selectedCountry === 'all' ? 'All Countries' : selectedCountry"></span>
              <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
              </svg>
            </button>

            <div x-show="countryDropdownOpen"
                 @click.away="countryDropdownOpen = false"
                 class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5">
              <div class="py-1">
                <a href="#"
                   @click.prevent="changeCountry('all')"
                   class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                  All Countries
                </a>
                <template x-for="country in countries" :key="country">
                  <a href="#"
                     @click.prevent="changeCountry(country)"
                     class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                     x-text="country">
                  </a>
                </template>
              </div>
            </div>
          </div>

          <a
            href="{{ route('billboards.index') }}"
            class="px-3 py-2 rounded-md text-sm font-medium {{ request()->routeIs('billboards') ? 'text-indigo-600' : 'text-gray-500 hover:text-gray-700' }}">
            Billboards
          </a>

          <a href="{{ route('about') }}" class="px-3 py-2 rounded-md text-sm font-medium {{ request()->routeIs('about') ? 'text-indigo-600' : 'text-gray-500 hover:text-gray-700' }}">
            About
          </a>
          <a href="{{ route('contact.index') }}" class="px-3 py-2 rounded-md text-sm font-medium {{ request()->routeIs('contact') ? 'text-indigo-600' : 'text-gray-500 hover:text-gray-700' }}">
            Contact
          </a>
        </div>

        <!-- Mobile menu button -->
        <div class="flex items-center sm:hidden">
          <button @click="mobileMenuOpen = !mobileMenuOpen" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100">
            <span class="sr-only">Open main menu</span>
            <svg x-show="!mobileMenuOpen" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
            <svg x-show="mobileMenuOpen" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
      </div>
    </div>

    <!-- Mobile menu -->
    <div x-show="mobileMenuOpen" class="sm:hidden">
      <div class="pt-2 pb-3 space-y-1">
        <a href="{{ route('home') }}" class="block px-3 py-2 rounded-md text-base font-medium {{ request()->routeIs('home') ? 'text-indigo-600 bg-indigo-50' : 'text-gray-500 hover:text-gray-700 hover:bg-gray-100' }}">
          Home
        </a>
        <div x-data="{
                        mobileCountryOpen: false,
                        countries: {{ json_encode(\App\Models\Billboard::select('country')->distinct()->get()->pluck('country')) }}
                    }">
          <button @click="mobileCountryOpen = !mobileCountryOpen" class="w-full text-left px-3 py-2 text-base font-medium text-gray-500">
            <span x-text="selectedCountry === 'all' ? 'All Countries' : selectedCountry"></span>
            <svg class="inline-block ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
            </svg>
          </button>
          <div x-show="mobileCountryOpen" class="pl-4">
            <a href="#"
               @click.prevent="changeCountry('all'); mobileCountryOpen = false"
               class="block px-3 py-2 text-base font-medium text-gray-500 hover:text-gray-700 hover:bg-gray-100">
              All Countries
            </a>
            <template x-for="country in countries" :key="country">
              <a href="#"
                 @click.prevent="changeCountry(country); mobileCountryOpen = false"
                 class="block px-3 py-2 text-base font-medium text-gray-500 hover:text-gray-700 hover:bg-gray-100"
                 x-text="country">
              </a>
            </template>
          </div>
        </div>

        <a
          href="{{ route('billboards.index') }}"
          class="block px-3 py-2 rounded-md text-base font-medium {{ request()->routeIs('billboards') ? 'text-indigo-600 bg-indigo-50' : 'text-gray-500 hover:text-gray-700 hover:bg-gray-100' }}">
          Billboards
        </a>

        <a href="{{ route('about') }}" class="block px-3 py-2 rounded-md text-base font-medium {{ request()->routeIs('about') ? 'text-indigo-600 bg-indigo-50' : 'text-gray-500 hover:text-gray-700 hover:bg-gray-100' }}">
          About
        </a>

        <a href="{{ route('contact.index') }}" class="block px-3 py-2 rounded-md text-base font-medium {{ request()->routeIs('contact') ? 'text-indigo-600 bg-indigo-50' : 'text-gray-500 hover:text-gray-700 hover:bg-gray-100' }}">
          Contact
        </a>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  <main>
    @yield('content')
  </main>

  <!-- Footer with Structured Data -->
  <footer class="bg-gray-800">
    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <div>
          <h3 class="text-white text-lg font-semibold mb-4">Contact Us</h3>
          <div itemscope itemtype="http://schema.org/Organization">
            <span itemprop="name" class="text-gray-300">FirstMark Advertising</span>
            <div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
              <span itemprop="streetAddress" class="text-gray-300">Your Street Address</span><br>
              <span itemprop="addressLocality" class="text-gray-300">City</span>,
              <span itemprop="addressCountry" class="text-gray-300">Malawi</span>
            </div>
            <span itemprop="email" class="text-gray-300">info@firstmarkmw.com</span><br>
            <span itemprop="telephone" class="text-gray-300">+265 999 999 999</span>
          </div>
        </div>

        <div>
          <h3 class="text-white text-lg font-semibold mb-4">Quick Links</h3>
          <ul class="space-y-2">
            <li><a href="{{ route('home') }}" class="text-gray-300 hover:text-white">Home</a></li>
            <li><a href="{{ route('billboards.index') }}" class="text-gray-300 hover:text-white">Billboards</a></li>
            <li><a href="{{ route('about') }}" class="text-gray-300 hover:text-white">About Us</a></li>
            <li><a href="{{ route('contact.index') }}" class="text-gray-300 hover:text-white">Contact</a></li>
          </ul>
        </div>

        <div>
          <h3 class="text-white text-lg font-semibold mb-4">Our Coverage</h3>

          <ul class="space-y-2">
            <li class="text-gray-300">Malawi</li>
            <li class="text-gray-300">Zambia</li>
          </ul>

          <div class="mt-6">
            <h4 class="text-white text-sm font-semibold mb-2">Follow Us</h4>

            <div class="flex space-x-4">
              <a href="#" class="text-gray-300 hover:text-white">
                <span class="sr-only">Facebook</span>
                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                  <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" />
                </svg>
              </a>

              <a href="#" class="text-gray-300 hover:text-white">
                <span class="sr-only">Instagram</span>
                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                  <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd" />
                </svg>
              </a>
            </div>
          </div>
        </div>
      </div>
      <div class="mt-8 border-t border-gray-700 pt-8">
        <p class="text-gray-400 text-sm text-center">
          © {{ date('Y') }} FirstMark Advertising. All rights reserved.
        </p>
      </div>
    </div>
  </footer>
</div>

@stack('scripts')
</body>
</html>
