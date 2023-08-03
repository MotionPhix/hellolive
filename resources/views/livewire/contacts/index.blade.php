<section>

  @teleport('header')

    <div class="flex items-center gap-4 px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">

      <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
          {{ __('Contacts') }}
      </h2>

      <span class="flex-1"></span>

      <x-secondary-button
        x-on:click.prevent="$dispatch('open-modal', 'create-base-contact')"
        x-data="">
        New contact
      </x-secondary-button>

    </div>

  @endteleport

  <div class="py-12">

    <div class="mx-auto space-y-6 max-w-7xl sm:px-6 lg:px-8">

      <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">

        <div class="p-6 text-gray-900 dark:text-gray-100">

          <x-text-input wire:model.live="search" />

          @foreach ($contacts as $contact)
            <div>{{ $contact->first_name . ' ' . $contact->last_name }}</div>
          @endforeach

        </div>

      </div>

    </div>

  </div>

</section>
