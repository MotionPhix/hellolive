

<div class="w-full px-2 py-4">

  <h2 class="mb-4 text-3xl font-semibold tracking-tighter text-gray-700 dark:text-white">
    Sign up
  </h2>

  <p class="mb-4 text-gray-500 text-md dark:text-white">
    Let's get you up and running in no time
  </p>

  <div class="mt-3 mb-8 border-t border-gray-300"></div>

  <form
    class="grid -m-2 sm:grid-cols-2"
    novalidate="novalidate"
    wire:submit="submit">

    <div class="w-full p-2">

      <x-input.group
        :error="$errors->first('form.first_name')"
        :inline="true"
        class="block"
        label="First Name"
        for="first_name">

        <x-input.text
          placeholder="Enter your first name"
          class="p-4 rounded-md"
          wire:model="form.first_name"
          type="text"
          id="first_name" />

      </x-input.group>

    </div>

    <div class="w-full p-2">

      <x-input.group
        :error="$errors->first('form.last_name')"
        :inline="true"
        class="block"
        label="Last Name"
        for="last_name">

        <x-input.text
          placeholder="Enter your last name"
          class="p-4 rounded-md"
          wire:model="form.last_name"
          type="text"
          id="last_name" />

      </x-input.group>

    </div>

    <div class="w-full p-2 sm:col-span-2">

      <x-input.group
        :error="$errors->first('form.email')"
        :inline="true"
        class="block"
        label="Email"
        for="email">

        <x-input.text
          placeholder="Email Address"
          class="p-4 rounded-md"
          wire:model="form.email"
          type="email"
          id="email" />

      </x-input.group>

    </div>

    <div class="w-full p-2 sm:col-span-2">

      <x-input.group
        :error="$errors->first('form.password')"
        for="password"
        label="Password"
        :inline="true">

        <x-input.text
          class="p-4 rounded-md md:pr-40"
          placeholder="Password"
          wire:model="form.password"
          type="password"
          id="password" />

      </x-input.group>

    </div>

    <div class="w-full p-2 sm:col-span-2">

      <x-input.group
        :inline="true"
        class="block"
        label="Password confirmation"
        for="password_confirmation">

        <x-input.text
          placeholder="Confirm your password"
          class="p-4 rounded-md"
          wire:model="form.password_confirmation"
          type="password"
          id="password_confirmation" />

      </x-input.group>

    </div>

    <div class="w-full p-3 mt-2 col-span-2">

      <div class="flex items-center">

        <x-input-label>

          <x-text-input
            type="checkbox"
            wire:model="form.agree_to_terms"
            class="w-5 h-5" />

          <span class="ml-2 font-medium text-md">
            Accept our terms of use
          </span>

        </x-input-label>

      </div>

    </div>

    <div class="w-full p-3 col-span-2">

      <x-primary-button
        class="justify-center w-full py-4">
        Sign up
      </x-primary-button>

    </div>

  </form>

</div>
