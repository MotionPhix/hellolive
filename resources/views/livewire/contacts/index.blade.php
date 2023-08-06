<x-slot:header>

  <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
    {{ __('Contacts') }}
  </h2>

  <span class="flex-1"></span>

  <x-secondary-button
    x-on:click.prevent="$dispatch('open-modal', 'base-contact')"
    x-data="">
    New contact
  </x-secondary-button>

</x-slot>

<div class="py-12">

  <div class="mx-auto space-y-6 max-w-7xl sm:px-6 lg:px-8">

    <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">

      <div class="p-6 text-gray-900 dark:text-gray-100 space-y-6">

        <x-text-input
          wire:model.live="search"
          placeholder="Search through contacts ..." />

        <x-table>

          <x-slot name="head">

            <x-table.heading
              sortable
              wire:click="sortBy('first_name')"
              :direction="$field === 'first_name' ? $direction : null">
              Name
            </x-table.heading>

            <x-table.heading
              sortable
              wire:click="sortBy('email')"
              :direction="$field === 'email' ? $direction : null">
              Email
            </x-table.heading>

            <x-table.heading sortable>
              Phone
            </x-table.heading>

            <x-table.heading
              sortable
              wire:click="sortBy('status')"
              :direction="$field === 'status' ? $direction : null">
              Status
            </x-table.heading>

          </x-slot>

          <x-slot name="body">

            @foreach ($contacts as $contact)

              <x-table.row>

                <x-table.cell>
                  {{ $contact->first_name . ' ' . $contact->last_name }}
                </x-table.cell>

                <x-table.cell>
                  {{ $contact->email }}
                </x-table.cell>

                <x-table.cell class="flex items-center gap-1">
                  @if(!$contact->phones->isEmpty())
                    <x-tabler-device-mobile class="text-gray-500" />
                  @endif

                  <span>

                    {{
                      $contact->phones->isEmpty()
                        ? 'No phone numbers found'
                        : $contact->phones->first()->number
                    }}

                  </span>
                </x-table.cell>

                <x-table.cell>
                  <span
                    class="{{ $contact->status === 'active' ? 'bg-green-100 text-green-800' : 'bg-rose-100 text-rose-800' }} inline-flex items-center px-2.5 py-0.5 rounded text-xs font-semibold leading-4 capitalize">
                    {{ $contact->status }}
                  </span>
                </x-table.cell>

                <x-table.cell>
                  <x-button.primary
                    x-on:click.prevent="$dispatch('update-contact', { id: {{ $contact->id }} })"
                    x-data="">
                    Edit
                  </x-button.primary>
                </x-table.cell>

              </x-table.row>

            @endforeach

          </x-slot>

        </x-table>

      </div>

    </div>

  </div>

</div>
