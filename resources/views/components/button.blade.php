<span class="inline-flex rounded-md shadow-sm">
  <button
    {{
      $attributes->merge([
        'type' => 'button',
        'class' => 'py-1.5 px-3 border rounded text-sm leading-5 font-medium focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition duration-150 ease-in-out' . ($attributes->get('disabled') ? ' opacity-75 cursor-not-allowed' : ''),
      ])
    }}
  >
    {{ $slot }}
  </button>
</span>