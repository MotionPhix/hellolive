<script setup lang="ts">
import { computed } from 'vue'
import { ChevronLeftIcon, ChevronRightIcon } from '@heroicons/vue/20/solid'

const props = defineProps<{
  links: [] | {}
}>()

const simpleLinks = computed(() => {
  if (props.links.length) {
    return props.links.filter(link =>
      link.label.includes('Previous') || link.label.includes('Next')
    )
  } else {
    return []
  }
})

const meta = computed(() => {
  if (props.links.length) {
    const currentPage = props.links.find(link => link.active)
    const total = props.links[props.links.length - 2].label
    const perPage = 12 // This should match your backend pagination

    const from = ((parseInt(currentPage.label) - 1) * perPage) + 1
    const to = Math.min(from + perPage - 1, total)

    return {
      from,
      to,
      total
    }
  } else {
    return null
  }
})
</script>

<template>
  <div class="flex items-center justify-between border-t border-gray-200 px-4 py-3 sm:px-6">
    <div class="flex flex-1 justify-between sm:hidden">
      <a v-for="link in simpleLinks"
         :key="link.label"
         :href="link.url"
         :class="[
           'relative inline-flex items-center px-4 py-2 text-sm font-medium rounded-md',
           link?.active
             ? 'z-10 bg-indigo-600 text-white focus:z-20'
             : 'text-gray-700 bg-white hover:bg-gray-50'
         ]">
        {{ link?.label }}
      </a>
    </div>
    <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between">
      <div>
        <p class="text-sm text-gray-700">
          Showing
          <span class="font-medium">{{ meta?.from }}</span>
          to
          <span class="font-medium">{{ meta?.to }}</span>
          of
          <span class="font-medium">{{ meta?.total }}</span>
          results
        </p>
      </div>
      <div>
        <nav class="isolate inline-flex -space-x-px rounded-md shadow-sm" aria-label="Pagination">
          <a v-for="link in links"
             :key="link.label"
             :href="link.url"
             :class="[
               'relative inline-flex items-center px-4 py-2 text-sm font-medium',
               link.active
                 ? 'z-10 bg-indigo-600 text-white focus:z-20'
                 : 'text-gray-700 bg-white hover:bg-gray-50',
               link.label.includes('Previous') ? 'rounded-l-md' : '',
               link.label.includes('Next') ? 'rounded-r-md' : '',
             ]"
             :aria-current="link.active ? 'page' : undefined">
            <span v-if="link.label.includes('Previous')" class="sr-only">Previous</span>
            <ChevronLeftIcon v-if="link.label.includes('Previous')" class="h-5 w-5" aria-hidden="true" />

            <span v-else-if="link.label.includes('Next')" class="sr-only">Next</span>
            <ChevronRightIcon v-else-if="link.label.includes('Next')" class="h-5 w-5" aria-hidden="true" />

            <span v-else v-html="link.label"></span>
          </a>
        </nav>
      </div>
    </div>
  </div>
</template>
