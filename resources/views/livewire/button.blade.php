<button
  type="{{ $type }}"
  {{ $attributes->merge(['class' => $classes]) }}>
  @if($icon && $iconPosition === 'left')
    <x-dynamic-component :component="$icon" class="-ml-1 mr-2 h-5 w-5" />
  @endif

  {{ $slot }}

  @if($icon && $iconPosition === 'right')
    <x-dynamic-component :component="$icon" class="ml-2 -mr-1 h-5 w-5" />
  @endif
</button>
