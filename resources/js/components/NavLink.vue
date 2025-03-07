<script setup lang="ts">
import {computed} from "vue";

const props = defineProps<{
  href: string
  activePath?: string
}>()

const toggleActiveClasses = computed(() => {
  if (props.activePath) {
    return route().current(props.activePath)
      ? 'font-bold text-black dark:text-white hover:text-blue-800 dark:hover:text-gray-400'
      : 'font-medium text-gray-700 dark:text-gray-400 hover:text-black dark:hover:text-gray-400'
  }
})
</script>

<template>
  <a
    :href="href"
    :class="toggleActiveClasses"
    class="inline-block w-full py-2 mx-0 text-left md:w-auto md:px-0 md:mx-2 lg:mx-3 md:text-center">
    <slot />
  </a>
</template>

<style scoped>

</style>
