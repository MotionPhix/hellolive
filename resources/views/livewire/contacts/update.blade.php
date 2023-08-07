<span>
  <x-heading
    closeable="base-contact-update"
    :title="$title">

    <form novalidate="novalidate" wire:submit="save">
      <div class="grid gap-6 mb-6 sm:grid-cols-2">
        <div>
          <label
            for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
            First name
          </label>

          <x-text-input
            id="first_name"
            class="block w-full"
            wire:model="form.first_name"
            placeholder="Enter contact first name"
            autofocus />

          <x-input-error :messages="$errors->get('form.first_name')" class="mt-2" />
        </div>

        <div>
          <label
            for="last_name"
            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
            Last name
          </label>

          <x-text-input
            type="text"
            id="last_name"
            class="block w-full"
            wire:model="form.last_name"
            placeholder="Enter contact last name" />

          <x-input-error :messages="$errors->get('form.last_name')" class="mt-2" />
          {{-- class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" --}}
        </div>

        <div class="sm:col-span-1">
          <label
            for="email"
            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
            Email address
          </label>

          <x-text-input
            type="email"
            wire:model="form.email"
            class="block w-full"
            placeholder="Enter contact's email address"
            id="email" />

          <x-input-error :messages="$errors->get('form.email')" class="mt-2" />
        </div>

        <div class="sm:col-span-1">
          <label
            for="phone"
            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
            Phone number
          </label>

          <x-text-input
            type="tel"
            class="block w-full"
            wire:model="form.phone"
            placeholder="Enter contact's phone number"
            id="phone" />

          <x-input-error :messages="$errors->get('form.phone')" class="mt-2" />
        </div>

        <div>
          <label
            for="company"
            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
            Company
          </label>

          <section class="flex items-center relative">

            <select
              id="company"
              wire:model="form.company_id"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
              <option disabled>Select contact's company</option>

              @foreach ($this->companies as $company)
                <option
                  value="{{ $company->id }}">
                  {{ $company->name }}
                </option>
              @endforeach
            </select>

            <button
              type="button"
              x-on:click.prevent="$dispatch('open-modal', 'create-company')"
              class="absolute right-0 flex items-center justify-center mr-2.5 w-6 h-6 text-gray-800 rounded bg-gray-300 dark:text-gray-200">
              <x-tabler-plus class="w-5 h-5" />
            </button>

          </section>

          <x-input-error :messages="$errors->get('form.company_id')" class="mt-2" />
        </div>

        <div>
          <label
            for="status"
            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
            Contact's state
          </label>

          <select
            id="status"
            wire:model="form.status"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
            <option selected>Pick a status</option>
            <option value="active">Active</option>
            <option value="dormant">In Active</option>
          </select>

          <x-input-error :messages="$errors->get('form.status')" class="mt-2" />
        </div>

      </div>

      <button
        type="submit"
        class="text-white inline-flex items-center bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
        <svg class="w-6 h-6 mr-1 -ml-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
        </svg>
        Update contact
      </button>
    </form>

    <livewire:contacts.company />

  </x-heading>
</span>
