<form wire:submit="submit" novalidate="novalidate">
  <!-- Session Status -->
  <x-auth-session-status class="mb-6" :status="session('status')" />

  <!-- Email-->
  <div>
    <x-input-label for="email" :value="__('Email address')" />

    <x-text-input
      id="email"
      class="block mt-1 w-full"
      wire:model="email"
      autofocus />

    <x-input-error :messages="$errors->get('email')" class="mt-2" />
  </div>

  <!-- Password -->
  <div class="mt-6">
    <x-input-label for="password" :value="__('Password')" />

    <x-text-input id="password" class="block mt-1 w-full" type="password" wire:model="password" />

    <x-input-error :messages="$errors->get('password')" class="mt-2" />
  </div>

  <!-- Remember Me -->
  <div class="mt-6 flex items-center justify-between">

    <label for="remember_me" class="inline-flex items-center">
      <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
      <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
    </label>

    @if (Route::has('password.request'))
      <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
        {{ __('Forgot your password?') }}
      </a>
    @endif

  </div>

  <div class="mt-4 flex items-center justify-end">

    <x-primary-button>
      {{ __('Sign in') }}
    </x-primary-button>
  </div>

</form>
