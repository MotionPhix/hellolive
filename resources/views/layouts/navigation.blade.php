{{--<nav--}}
{{--  x-data="{ open: false }"--}}
{{--  class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700 sticky top-0 z-20">--}}
{{--  <!-- Primary Navigation Menu -->--}}
{{--  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">--}}
{{--    <div class="flex justify-between h-16">--}}
{{--      <!-- Logo and Primary Nav Items -->--}}
{{--      <div class="flex">--}}
{{--        <!-- Logo -->--}}
{{--        <div class="shrink-0 flex items-center">--}}
{{--          <a--}}
{{--            href="{{ route('home') }}" class="flex items-center">--}}
{{--            <app-logo :size="12"></app-logo>--}}
{{--          </a>--}}
{{--        </div>--}}

{{--        <!-- Primary Navigation -->--}}
{{--        <div class="hidden sm:flex sm:ml-8">--}}
{{--          <div class="flex space-x-8">--}}
{{--            <a href="{{ route('home') }}"--}}
{{--               class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('home') ? 'border-indigo-500 text-gray-900 dark:text-white' : 'border-transparent text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 hover:border-gray-300 dark:hover:border-gray-600' }}">--}}
{{--              Home--}}
{{--            </a>--}}

{{--            <a href="{{ route('billboards.index') }}"--}}
{{--               class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('billboards.*') ? 'border-indigo-500 text-gray-900 dark:text-white' : 'border-transparent text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 hover:border-gray-300 dark:hover:border-gray-600' }}">--}}
{{--              Billboards--}}
{{--            </a>--}}

{{--            <a href="{{ route('about') }}"--}}
{{--               class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('about') ? 'border-indigo-500 text-gray-900 dark:text-white' : 'border-transparent text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 hover:border-gray-300 dark:hover:border-gray-600' }}">--}}
{{--              Company--}}
{{--            </a>--}}

{{--            <a href="{{ route('contact.index') }}"--}}
{{--               class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('contact.*') ? 'border-indigo-500 text-gray-900 dark:text-white' : 'border-transparent text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 hover:border-gray-300 dark:hover:border-gray-600' }}">--}}
{{--              Contact--}}
{{--            </a>--}}
{{--          </div>--}}
{{--        </div>--}}
{{--      </div>--}}

{{--      <!-- Secondary Navigation -->--}}
{{--      <div class="hidden sm:flex sm:items-center sm:ml-6">--}}
{{--        <!-- Dark mode toggle -->--}}
{{--        <div>--}}
{{--          <theme-switch/>--}}
{{--        </div>--}}

{{--        <!-- CTA Button -->--}}
{{--        <div class="ml-6">--}}
{{--          <a href="{{ route('contact.index') }}"--}}
{{--             class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">--}}
{{--            Get Started--}}
{{--          </a>--}}
{{--        </div>--}}
{{--      </div>--}}

{{--      <!-- Mobile menu button -->--}}
{{--      <div class="flex items-center sm:hidden">--}}
{{--        <button--}}
{{--          @click="open = !open"--}}
{{--          class="inline-flex items-center justify-center p-2 rounded-md text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500 dark:focus:ring-offset-gray-800">--}}
{{--          <span class="sr-only">Open main menu</span>--}}

{{--          <svg class="h-6 w-6" :class="{ 'hidden': open, 'block': !open }" fill="none" stroke="currentColor"--}}
{{--               viewBox="0 0 24 24">--}}
{{--            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>--}}
{{--          </svg>--}}

{{--          <svg class="h-6 w-6" :class="{ 'block': open, 'hidden': !open }" fill="none" stroke="currentColor"--}}
{{--               viewBox="0 0 24 24">--}}
{{--            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>--}}
{{--          </svg>--}}
{{--        </button>--}}
{{--      </div>--}}
{{--    </div>--}}
{{--  </div>--}}

{{--  <!-- Mobile menu -->--}}
{{--  <div :class="{ 'block': open, 'hidden': !open }" class="sm:hidden">--}}
{{--    <div class="pt-2 pb-3 space-y-1">--}}
{{--      <x-responsive-nav-link :href="route('home')" :active="request()->routeIs('home')">--}}
{{--        Home--}}
{{--      </x-responsive-nav-link>--}}
{{--      <x-responsive-nav-link :href="route('billboards.index')" :active="request()->routeIs('billboards.*')">--}}
{{--        Billboards--}}
{{--      </x-responsive-nav-link>--}}
{{--      <x-responsive-nav-link :href="route('about')" :active="request()->routeIs('about')">--}}
{{--        About--}}
{{--      </x-responsive-nav-link>--}}
{{--      <x-responsive-nav-link :href="route('contact.index')" :active="request()->routeIs('contact.*')">--}}
{{--        Contact--}}
{{--      </x-responsive-nav-link>--}}
{{--    </div>--}}
{{--  </div>--}}
{{--</nav>--}}


<responsive-nav></responsive-nav>
