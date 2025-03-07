<script setup lang="ts">
defineProps<{
  featureTitle: string,
  explanation: string,
}>()
</script>

<template>
  <div
    class="relative flex flex-col justify-between col-span-4 p-6 space-y-4 overflow-hidden bg-gray-100 sm:rounded-xl">
    <div>
      <div class="text-white bg-blue-500 rounded-full flex items-center justify-center w-16 h-16">
        <slot/>
      </div>
    </div>

    <h4 class="text-2xl font-medium text-gray-700">
      {{ featureTitle }}
    </h4>

    <p class="text-lg text-gray-500">
      {{ explanation }}
    </p>
  </div>
</template>
