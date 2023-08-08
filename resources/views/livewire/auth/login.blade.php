{{-- <form wire:submit="submit" novalidate="novalidate">

  <!-- Email-->
  <div>
    <x-input-label for="email" :value="__('Email address')" />

    <x-text-input
      id="email"
      class="block w-full mt-1"
      wire:model="email"
      autofocus />

    <x-input-error :messages="$errors->get('email')" class="mt-2" />
  </div>

  <!-- Password -->
  <div class="mt-6">
    <x-input-label for="password" :value="__('Password')" />

    <x-text-input id="password" class="block w-full mt-1" type="password" wire:model="password" />

    <x-input-error :messages="$errors->get('password')" class="mt-2" />
  </div>

  <!-- Remember Me -->
  <div class="flex items-center justify-between mt-6">

    <label for="remember_me" class="inline-flex items-center">
      <input id="remember_me" type="checkbox" class="text-indigo-600 border-gray-300 rounded shadow-sm dark:bg-gray-900 dark:border-gray-700 focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
      <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
    </label>

    @if (Route::has('password.request'))
      <a class="text-sm text-gray-600 underline rounded-md dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
        {{ __('Forgot your password?') }}
      </a>
    @endif

  </div>

  <div class="flex items-center justify-end mt-4">

    <x-primary-button>
      {{ __('Sign in') }}
    </x-primary-button>
  </div>

</form> --}}

<div class="w-full px-2 py-4">

  <h2 class="mb-4 text-3xl font-semibold tracking-tighter text-gray-700 dark:text-white">
    Welcome again
  </h2>

  <p class="mb-8 leading-tight text-gray-500 text-md dark:text-white -tracking-tighter">
    We hope your projects are up-to-par and you have a lot of tasks to manage. Let's get you up to speed!
  </p>

  <form
    class="flex flex-wrap -m-2"
    novalidate="novalidate"
    wire:submit="submit">

    <div class="w-full p-2">

      <x-input.group
        :error="$errors->first('email')"
        :inline="true"
        class="block"
        label="Email"
        for="email">

        <x-input.text
          placeholder="Email Address"
          class="p-4 rounded-md"
          wire:model="email"
          type="email"
          id="email" />

      </x-input.group>

    </div>

    <div class="w-full p-2">

      <x-input.group
        :error="$errors->first('password')"
        for="password"
        label="Password"
        :inline="true">

        <section
          class="relative">

          <x-input.text
            class="p-4 rounded-md md:pr-40"
            placeholder="Password"
            wire:model="password"
            type="password"
            id="password" />

          <a
            class="inline-block px-4 pb-4 text-sm tracking-tight text-gray-300 transition duration-200 dark:text-gray-200 md:absolute md:right-4 md:top-1/2 md:transform md:-translate-y-1/2 md:p-0 hover:text-gray-400 dark:hover:text-gray-300"
            wire:navigate>
            Forgot Password?
          </a>

        </section>

      </x-input.group>

    </div>

    <div class="w-full p-3 mt-2">

      <div class="flex items-center">

        <x-input-label>

          <x-text-input
            type="checkbox"
            class="w-5 h-5" />

          <span class="ml-2 font-medium text-md">
            Remember me
          </span>

        </x-input-label>

      </div>

    </div>

    <div class="w-full p-3">

      <x-primary-button
        class="justify-center w-full py-4">
        Sign In
      </x-primary-button>

    </div>

  </form>

</div>
