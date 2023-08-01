<div>

  @teleport('header')

    <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8 flex items-center gap-4">

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

    </div>

  @endteleport

</div>
