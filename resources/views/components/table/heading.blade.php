@props([
  'sortable' => null,
  'direction' => null,
])

<th {{ $attributes->merge(['class' => 'px-6 py-3 bg-cool-gray-50'])->only('class') }}>

  @unless ($sortable)

    <span
      class="text-left text-xs leading-4 font-medium text-cool-gray-500 uppercase tracking-wider">
      {{ $slot }}
    </span>

  @else

    <button
      {{ $attributes->except('class') }}
      class="flex items-center space-x-2 uppercase text-left text-xs leading-4 font-medium text-gray-600 group focus:outline-none focus:underline">
      <span>
        {{ $slot }}
      </span>

      <span>
        @if($direction === 'asc')

          <x-tabler-chevron-up class="w-3 h-3" />

        @elseif ($direction === 'desc')

          <x-tabler-chevron-down class="w-3 h-3" />

        @else

          <x-tabler-arrow-up
            class="w-3 h-3 opacity-0 group-hover:opacity-100 transition-opacity duration-300" />

        @endif

      </span>

    </button>

  @endunless
</th>
