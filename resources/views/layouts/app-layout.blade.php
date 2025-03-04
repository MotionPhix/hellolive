<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ $metaDescription ?? 'Find the perfect outdoor advertising locations in Malawi & Zambia. Book your billboard space today!' }}">
    <meta name="keywords" content="billboards, advertising, outdoor advertising, Malawi, Zambia">
    <meta name="author" content="FirstMark Media">
    <meta property="og:title" content="{{ $metaTitle ?? 'FirstMark Media - Billboard Advertising' }}">
    <meta property="og:description" content="{{ $metaDescription ?? 'Find the perfect outdoor advertising locations in Malawi & Zambia. Book your billboard space today!' }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ asset('images/preview.jpg') }}">

    <title>{{ $metaTitle ?? 'FirstMark Media' }}</title>

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite('resources/css/app.css')
  </head>
  <body
    x-data="{ darkMode: localStorage.getItem('darkMode') === 'true' }"
    :class="{ 'dark': darkMode }">
    @include('components.navigation')

    <main class="container mx-auto px-4 py-6">
      {{ $slot }}
    </main>

    {{-- Footer --}}
    <footer class="bg-gray-800 text-white py-6 text-center">
      <p>&copy; {{ date('Y') }} FirstMark Media. All rights reserved.</p>
      <div class="mt-2">
        <a href="#" class="text-blue-400 hover:underline">Privacy Policy</a> |
        <a href="#" class="text-blue-400 hover:underline">Terms of Service</a>
      </div>
    </footer>

    <script>
      document.addEventListener('alpine:init', () => {
        Alpine.data('theme', () => ({
          darkMode: localStorage.getItem('darkMode') === 'true',
          toggle() {
            this.darkMode = !this.darkMode;
            localStorage.setItem('darkMode', this.darkMode);
          }
        }));
      });
    </script>
  </body>
</html>
