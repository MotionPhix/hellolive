<nav class="bg-white dark:bg-gray-900 shadow-md">
  <div class="container mx-auto px-4 py-3 flex justify-between items-center">
    <a
      href="{{ route('home') }}"
      class="text-lg font-semibold text-gray-900 dark:text-white">
      FirstMark Media
    </a>

    <div class="flex items-center space-x-6">
      <a
        href="{{ route('billboards.index') }}"
        class="text-gray-700 dark:text-gray-300 hover:text-blue-600">
        Billboards
      </a>

      <a href="{{ route('about') }}" class="text-gray-700 dark:text-gray-300 hover:text-blue-600">About</a>
      <a href="{{ route('contact') }}" class="text-gray-700 dark:text-gray-300 hover:text-blue-600">Contact</a>

      <div x-data="{ open: false, countries: @json($countries) }" class="relative">
        <button @click="open = !open" class="text-gray-700 dark:text-gray-300 hover:text-blue-600">
          Select Country
        </button>

        <div
          x-show="open"
          @click.away="open = false"
          class="absolute mt-2 w-48 bg-white dark:bg-gray-800 shadow-md rounded-md">
          <a href="{{ route('billboards', ['country' => 'all']) }}" class="block px-4 py-2 text-gray-700 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700">All Countries</a>

          <template x-for="country in countries" :key="country.code">
            <a :href="`{{ route('billboards') }}?country=${country.code}`" class="block px-4 py-2 text-gray-700 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700" x-text="country.name"></a>
          </template>
        </div>
      </div>

      <button @click="darkMode = !darkMode; localStorage.setItem('darkMode', darkMode)" class="text-gray-700 dark:text-gray-300">
        <span x-show="!darkMode">🌙</span>
        <span x-show="darkMode">☀️</span>
      </button>
    </div>
  </div>
</nav>
