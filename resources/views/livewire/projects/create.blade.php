<span>
  <x-heading
    closeable="base-project"
    title="Create project">

    <form
      wire:submit="submit"
      novalidate="novalidate">

      <div class="grid gap-4 mb-4 sm:grid-cols-2">

        <div class="col-span-1">

          <x-input-label
            for="name"
            class="mb-2"
            value="Project name" />

          <x-text-input
            id="name"
            type="text"
            class="w-full"
            wire:model="form.name"
            placeholder="Enter project's name"
          />

          <x-input-error :messages="$errors->get('form.name')" class="mt-2" />
        </div>

        <div class="col-span-1">
          <x-input-label
            for="contact"
            class="mb-2"
            value="Project contact" />

          <x-selectable
            wire:model="form.contact_id"
            placeholder="Pick a contact person"
            :options="$contacts" />

          {{-- <select
            wire:model="form.contact_id"
            placeholder="Select project's company"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">

            <option value="" disabled>Pick a contact</option>

            @foreach ($contacts as $contact)
              <option value="{{ $contact['id'] }}" wire:key="{{ $contact['id'] }}">
                {{ $contact['option'] }}
              </option>
            @endforeach
          </select> --}}

          <x-input-error :messages="$errors->get('form.contact_id')" class="mt-2" />
        </div>

        <div class="col-span-2">

          <x-input-label
            for="description"
            value="Project description"
            class="mb-2" />

          <x-textarea
            id="description"
            wire:model="form.description"
            placeholder="Type project's name" />

          <x-input-error :messages="$errors->get('form.description')" class="mt-2" />

        </div>

        <div class="flex items-center justify-end col-span-2 gap-4 pt-4">

          <button
            type="submit"
            class="text-white inline-flex items-center dark:bg-gray-900 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800"
          >
            <x-tabler-plus class="mr-2" />

            Create project
          </button>
        </div>
      </div>

    </form>

  </x-heading>
</span>
