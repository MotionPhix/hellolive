<div x-data="{
  highlighted: 0,
  count: {{ count($items) }},
  next() {
  console.log(this.highlighted);
    this.highlighted = (this.highlighted + 1) % this.count;
  },
  previous() {
    this.highlighted = (this.highlighted + this.count - 1) % this.count;
  },
  select() {
    this.$wire.call('select', this.highlighted)
  },
  close() {
    if (this.$wire.open) {
      this.$wire.open = false;
    }
  }
 }"
   x-init="highlighted =  {{ $selected ?: 0 }}"
   @click.outside="close()"
>
  <x-input-label value="{{ $label }}" />

  <div class="relative mt-1">
    <button
      wire:click="toggle"
      class="flex items-center justify-between w-full h-10 px-3 border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600"
      @keydown.arrow-down="next()"
      @keydown.arrow-up="previous()"
      @keydown.enter.prevent="select()"
      type="button"
    >
      @if ($selected !== null)
        {{ $items[$selected] }}
      @else
        Choose...
      @endif

      <div class="text-gray-400">
        @if ($open)
          <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd"
              d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z"
              clip-rule="evenodd"/>
          </svg>
        @else
          <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd"
              d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
              clip-rule="evenodd"/>
          </svg>
        @endif
      </div>
    </button>

    @if ($open)
      <ul class="absolute z-10 w-full mt-1 bg-white border rounded-lg">
        @foreach($items as $item)
          <li wire:click="select({{ $loop->index }})"
            x-data="{ index: {{ $loop->index }} }"
            class="flex items-center justify-between px-3 py-2 cursor-pointer"
            :class="{'bg-blue-400 text-white': index === highlighted}"
            @mouseover="highlighted = index"
          >
            {{ $item }}

            @if ($selected === $loop->index)
              <div :class="true ? 'text-white' : 'text-blue-500'">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20"
                   fill="currentColor">
                  <path fill-rule="evenodd"
                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                    clip-rule="evenodd"/>
                </svg>
              </div>
            @endif
          </li>
        @endforeach
      </ul>
    @endif
  </div>
</div>
