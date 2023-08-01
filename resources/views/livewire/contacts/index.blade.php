<section>

  @teleport('header')

    <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8 flex items-center gap-4">

      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
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

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

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
