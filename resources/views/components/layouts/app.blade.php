<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? config('app.name') }}</title>

    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <!-- Scripts -->
    @vite(['resources/js/app.js'])
  </head>

  <body class="min-h-screen font-sans antialiased bg-gray-100 dark:bg-gray-900">

    @include('components/layouts/navigation')

    <!-- Page Heading -->
    @if(isset($header))

      <header
        class="sticky top-0 z-10 bg-white shadow dark:bg-gray-800">

          <div class="flex items-center gap-4 px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">

            {{ $header }}

          </div>

      </header>

    @endif

    <!-- Page Content -->
    <main>
      {{ $slot }}
    </main>

    <x-modal
      name="base-project"
      focusable>
      <livewire:projects.create />
    </x-modal>

    <x-modal
      name="base-company"
      focusable>
      <livewire:companies.create />
    </x-modal>

    <x-modal
      name="base-contact"
      focusable>
      <livewire:contacts.create />
    </x-modal>

    <x-modal
      name="base-contact-update"
      focusable>
      <livewire:contacts.update />
    </x-modal>

  </body>
</html>
