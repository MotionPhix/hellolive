@props([
    'type' => 'button',
    'variant' => 'primary',
    'size' => 'md',
    'icon' => null,
    'iconPosition' => 'left'
])

@php
  $baseClasses = 'inline-flex items-center justify-center font-medium rounded-md focus:outline-none transition duration-150 ease-in-out';

  $variants = [
      'primary' => 'border border-transparent text-white bg-indigo-600 hover:bg-indigo-700 focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-900',
      'secondary' => 'border border-transparent text-indigo-700 bg-indigo-100 hover:bg-indigo-200 focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-900',
      'outline' => 'border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-700 focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-900',
      'danger' => 'border border-transparent text-white bg-red-600 hover:bg-red-700 focus:ring-2 focus:ring-offset-2 focus:ring-red-500 dark:focus:ring-offset-gray-900',
      'tab' => 'border border-transparent text-gray-700 dark:text-gray-300 bg-gray-100 dark:bg-gray-800 hover:bg-gray-200 dark:hover:bg-gray-700 focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-900',
      'tab-active' => 'border border-transparent text-white bg-indigo-600 hover:bg-indigo-700 focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-900',
  ];

  $sizes = [
      'sm' => 'px-3 py-1.5 text-sm',
      'md' => 'px-4 py-2 text-base',
      'lg' => 'px-6 py-3 text-lg',
  ];

  // Debug output
  $variantKey = $variant;
  if (!array_key_exists($variantKey, $variants)) {
      $variantKey = 'primary'; // fallback
  }

  $classes = $baseClasses . ' ' . $variants[$variantKey] . ' ' . $sizes[$size];
@endphp

  <!-- Debug output -->
<span class="">Variant: {{ $variant }}</span>

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
