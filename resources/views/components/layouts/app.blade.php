<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
 {{-- x-data="switchTheme()" :class="{ 'dark': darkTheme }" --}}
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

  <header class="sticky top-0 z-10 bg-white shadow dark:bg-gray-800">

    <div class="flex items-center gap-4 px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">

      {{ $header }}

    </div>

  </header>

  @endif

  <!-- Page Content -->
  <main>
    {{ $slot }}
  </main>

  <x-modal name="base-project" focusable>
    <livewire:projects.create />
  </x-modal>

  <x-modal name="base-company" focusable>
    <livewire:companies.create />
  </x-modal>

  <x-modal name="base-contact" focusable>
    <livewire:contacts.create />
  </x-modal>

  <x-modal name="base-contact-update" focusable>
    <livewire:contacts.update />
  </x-modal>

  {{-- <script>
        function switchTheme() {
            return {
                darkTheme: localStorage.getItem('darkTheme') == 'true',

                toggleTheme() {
                    this.darkTheme = !this.darkTheme;
                    localStorage.setItem('darkTheme', this.darkTheme);
                }
            }
        }
    </script> --}}

  <script>

    // Initial load of the page
    window.addEventListener("livewire:init", function() {

      var mode = 'light';

      //Check if User Has Set Pref from Application
      if (('theme' in localStorage)) {

        switchMode(localStorage.theme)

      } else {

        // User Has No Preference, So Get the Browser Mode ( set in Computer settings )
        if (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches) {

          mode = 'dark';

        } else {

          mode = 'light';

        }

        localStorage.theme = mode;

        // Inform Livewire of the Mode so that It toggles the DarkMode set  in Tailwind.config.js
        Livewire.dispatchTo('theme', 'mode-view', localStorage.theme)

        switchMode(mode)

      }
    });

    // In case the use changed the moe from Browser Pref, Then Override the Application Settings
    window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', e => {

      const newColorScheme = e.matches
        ? document.documentElement.classList.add('dark')
        : document.documentElement.classList.remove('dark');

      localStorage.theme = newColorScheme;

      Livewire.dispatchTo('theme', 'mode-view', e.matches ? 'dark' : 'light')

    });


    function switchMode(mode) {

      if (localStorage.theme === 'dark') {

        document.documentElement.classList.add('dark')

      } else {

        document.documentElement.classList.remove('dark')

      }

      Livewire.dispatchTo('theme', 'mode-view', mode)

    }

    // this emitted from Livewire to change the Class DarkMoe on and Off.
    /* window.addEventListener('view-mode', event => {

      localStorage.theme = event.detail.newMode;

      switchMode(event.detail.newMode);

    });*/

    Livewire.on('mode-changed', (options) => {

      console.log(options)

      // localStorage.theme = event.detail.newMode

      // switchMode(event.detail.newMode);

    })

  </script>

</body>
</html>
