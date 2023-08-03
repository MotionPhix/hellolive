<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ $title ?? config('app.name') }}</title>

  <!-- Scripts -->
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen font-sans antialiased bg-gray-100 dark:bg-gray-900">

  @include('components/layouts/navigation')

  <!-- Page Heading -->
  <header class="sticky top-0 z-10 bg-white shadow dark:bg-gray-800"></header>

  <!-- Page Content -->
  <main>
    {{ $slot }}
  </main>

  <x-modal
    name="create-base-company"
    :show="$errors->userDeletion->isNotEmpty()"
    focusable>
    <livewire:companies.create />
  </x-modal>

  <x-modal
    name="create-base-contact"
    :show="$errors->userDeletion->isNotEmpty()"
    focusable>
    <livewire:contacts.create />
  </x-modal>

  <x-modal
    name="create-base-project"
    :show="$errors->userDeletion->isNotEmpty()"
    focusable>
    <livewire:projects.create />
  </x-modal>

</body>
</html>
