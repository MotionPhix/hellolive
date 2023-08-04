<textarea
  x-data="{
    resize () {
      $el.style.height = '0px';
      $el.style.height = $el.scrollHeight + 'px'
    }
  }"
  x-init="resize()"
  @input="resize()"
  {{ $attributes}}
  class="flex w-full h-auto min-h-[80px] border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
  {{-- class="flex w-full h-auto min-h-[80px] px-3 py-2 text-sm bg-white border rounded-md border-neutral-300 ring-offset-background placeholder:text-neutral-400 focus:border-neutral-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-neutral-400 disabled:cursor-not-allowed disabled:opacity-50" --}}
</textarea>
