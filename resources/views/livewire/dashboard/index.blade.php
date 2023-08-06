<x-slot:header>

  <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
      {{ __('Dashboard') }}
  </h2>

  <span class="flex-1"></span>

  <x-secondary-button
    x-on:click.prevent="$dispatch('open-modal', 'create-base-contact')"
    x-data="">
    New contact
  </x-secondary-button>

  <x-secondary-button
    x-on:click.prevent="$dispatch('open-modal', 'create-base-company')"
    x-data="">
    Add company
  </x-secondary-button>

</x-slot>

<div class="py-12">

  <div class="mx-auto space-y-6 max-w-7xl sm:px-6 lg:px-8">

    <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">

      <div class="p-6 text-gray-900 dark:text-gray-100 space-y-6">

        <h2>
          Some dashboard data will go here later in the day!
        </h2>

      </div>

    </div>

  </div>

</div>
