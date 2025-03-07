<script setup lang="ts">
import { ref, computed, onMounted } from 'vue'
import { TransitionRoot } from '@headlessui/vue'
import Pagination from '../Pagination.vue'

const props = defineProps<{
  initialBillboards: []
  initialCountries: []
  initialCities: [] | {}
  initialTypes: []
  initialFilters: {
    country: string
    city: string
    type: string
    sort: string
  }
  links: [] | {}
}>()

const showFilters = ref(false)
const scrolled = ref(false)
const billboards = ref(props.initialBillboards)
const countries = ref(props.initialCountries)
const cities = ref(props.initialCities)
const types = ref(props.initialTypes)
const filters = ref(props.initialFilters)

const statistics = computed(() => [
  { value: billboards.value.length, label: 'Total Billboards' },
  { value: billboards.value.filter(b => b.is_available).length, label: 'Available Now' },
  { value: [...new Set(billboards.value.map(b => b.city))].length, label: 'Cities' },
  { value: [...new Set(billboards.value.map(b => b.country))].length, label: 'Countries' }
])

const filteredCities = computed(() => {
  if (filters.value.country === 'all') return cities.value
  return cities.value.filter(city => {
    const billboard = billboards.value.find(b => b.city.toLowerCase() === city.toLowerCase())
    return billboard && billboard.country.toLowerCase() === filters.value.country
  })
})

const isFiltered = computed(() => {
  return filters.value.country !== 'all' ||
    filters.value.city !== 'all' ||
    filters.value.type !== 'all'
})

const updateFilters = () => {
  const queryParams = new URLSearchParams(filters.value)
  window.location.href = `${window.location.pathname}?${queryParams.toString()}`
}

const clearFilters = () => {
  window.location.href = window.location.pathname
}

const formatPrice = (price) => {
  return new Intl.NumberFormat().format(price)
}

onMounted(() => {
  window.addEventListener('scroll', () => {
    scrolled.value = window.scrollY > 0
  })
})
</script>

<template>
  <div class="min-h-screen bg-gray-50">
    <!-- Hero Section -->
    <div class="relative min-h-[40vh] flex items-center">
      <div class="absolute inset-0">
        <div class="absolute inset-0 z-0">
          <img
            class="w-full h-full object-cover"
            src="https://images.unsplash.com/photo-1665686374006-b8f04cf62d57?ixlib=rb-4.0.3&ixid=MnwxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1020&q=80"
            alt="FirstMark Billboards">
        </div>
        <div class="absolute inset-0 bg-gradient-to-r from-indigo-900/90 via-indigo-800/85 to-indigo-900/80 mix-blend-multiply"></div>
      </div>

      <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-32">
        <div class="max-w-3xl">
          <div class="w-20 h-1 bg-indigo-500 mb-8"></div>

          <h1 class="text-5xl sm:text-6xl lg:text-7xl font-bold">
            <span class="font-display text-transparent bg-clip-text bg-gradient-to-r from-indigo-200 to-white">
              Our billboards
            </span>
          </h1>

          <p class="mt-2 text-lg text-gray-600 dark:text-gray-300">
            Find the perfect location for your advertisement
          </p>

          <!-- Statistics -->
          <div class="mt-12 grid grid-cols-1 sm:grid-cols-4 gap-8">
            <div v-for="(stat, index) in statistics"
                 :key="index"
                 class="bg-white/10 backdrop-blur-sm rounded-lg p-6 transform hover:scale-105 transition-transform duration-300">
              <div class="text-4xl font-bold text-white mb-2">{{ stat.value }}</div>
              <div class="text-indigo-200">{{ stat.label }}</div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Sticky Header & Filters -->
    <div class="sticky top-16 z-10 bg-white transition-shadow duration-300"
         :class="{ 'shadow-lg': scrolled }">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
        <!-- Main Controls -->
        <div class="flex items-center justify-between">
          <div class="flex items-center space-x-4">
            <button @click="showFilters = !showFilters"
                    class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
              <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
              </svg>
              Filters
            </button>
          </div>

          <div class="flex items-center space-x-4">
            <label class="text-sm text-gray-500">Sort by:</label>
            <select v-model="filters.sort"
                    @change="updateFilters"
                    class="form-select rounded-md border-gray-300 py-1 text-sm focus:border-indigo-500 focus:ring-indigo-500">
              <option value="created_at-desc">Newest</option>
              <option value="created_at-asc">Oldest</option>
              <option value="price-asc">Price: Low to High</option>
              <option value="price-desc">Price: High to Low</option>
            </select>
          </div>
        </div>

        <!-- Filters Panel -->
        <TransitionRoot appear :show="showFilters" as="template">
          <div class="mt-4 grid grid-cols-1 gap-4 md:grid-cols-3">
            <!-- Country Filter -->
            <div>
              <label class="block text-sm font-medium text-gray-700">Country</label>
              <select
                v-model="filters.country"
                @change="updateFilters"
                class="mt-1 block w-full rounded-md border-gray-300 py-2 pl-3 pr-10 text-base focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                <option value="all">All Countries</option>
                <option v-for="country in countries" :key="country" :value="country.toLowerCase()">
                  {{ country }}
                </option>
              </select>
            </div>

            <!-- City Filter -->
            <div>
              <label class="block text-sm font-medium text-gray-700">City</label>
              <select
                v-model="filters.city"
                @change="updateFilters"
                class="mt-1 block w-full rounded-md border-gray-300 py-2 pl-3 pr-10 text-base focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                <option value="all">All Cities</option>
                <option v-for="city in filteredCities" :key="city" :value="city.toLowerCase()">
                  {{ city }}
                </option>
              </select>
            </div>

            <!-- Type Filter -->
            <div>
              <label class="block text-sm font-medium text-gray-700">Type</label>
              <select
                v-model="filters.type"
                @change="updateFilters"
                class="mt-1 block w-full rounded-md border-gray-300 py-2 pl-3 pr-10 text-base focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                <option value="all">All Types</option>
                <option v-for="type in types" :key="type" :value="type.toLowerCase()">
                  {{ type }}
                </option>
              </select>
            </div>
          </div>
        </TransitionRoot>
      </div>
    </div>

    <!-- Billboards Grid -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
      <!-- Empty State -->
      <div v-if="!billboards.length" class="text-center py-12">
        <div class="w-full max-w-sm mx-auto">
          <svg class="mx-auto h-24 w-24 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
          </svg>

          <h3 class="mt-4 text-lg font-medium text-gray-900">No Billboards Found</h3>

          <p class="mt-2 text-sm text-gray-500">
            {{ isFiltered
            ? 'No billboards match your current filter criteria. Try adjusting your filters.'
            : 'There are no billboards available at the moment.' }}
          </p>

          <!-- Action buttons -->
          <div class="mt-6 flex justify-center gap-3">
            <button
              v-if="isFiltered"
              @click="clearFilters"
              class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
              Clear Filters
            </button>

            <a
              :href="route('contact.index')"
               class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
              Contact Us
            </a>
          </div>
        </div>
      </div>

      <!-- Billboards Grid -->
      <div v-else class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Card -->
        <div
          :key="billboard.uuid"
          v-for="billboard in billboards"
          class="relative overflow-hidden group flex flex-col h-full bg-white border border-gray-200 shadow-2xs rounded-xl dark:bg-neutral-900 dark:border-neutral-700 dark:shadow-neutral-700/70">
          <!--div class="h-52 flex flex-col justify-center items-center bg-blue-600 rounded-t-xl">
          </div-->

          <!-- Image -->
          <div class="aspect-w-16 aspect-h-9 relative">
            <img
              :src="billboard.featured_image || `https://images.unsplash.com/photo-1585159812596-fac104f2f069?q=80&w=320&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D`"
              :alt="billboard.name"
              class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">

            <div
              v-if="!billboard.is_available"
              class="absolute right-0 top-0">
              <span class="px-4 py-2 bg-red-500 text-white rounded-bl-lg text-sm font-semibold">
                Booked
              </span>
            </div>
          </div>

          <div class="p-4 md:p-6">

            <span class="block mb-1 text-xs font-semibold uppercase text-blue-600 dark:text-blue-500">
              {{ billboard.city }}, {{ billboard.country }}
            </span>

            <h3 class="text-xl font-semibold text-gray-800 dark:text-neutral-300 dark:hover:text-white">
              {{ billboard.name }}
            </h3>

            <!--p class="mt-3 text-gray-500 dark:text-neutral-500">
              {{ billboard.description }}
            </p-->

          </div>

          <div class="mt-auto flex border-t border-gray-200 divide-x divide-gray-200 dark:border-neutral-700 dark:divide-neutral-700">
            <a
              class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-es-xl bg-white text-gray-800 shadow-2xs hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800 dark:focus:bg-neutral-800"
              :href="route('billboards.show', billboard)">
              View details
            </a>

            <a
              class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-ee-xl bg-white text-gray-800 shadow-2xs hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800 dark:focus:bg-neutral-800"
              href="#">
              Request quote
            </a>
          </div>
        </div>
        <!-- End Card -->
      </div>

      <!-- Pagination -->
      <pagination
        v-if="billboards.length && Object.keys(links).length"
        :links="links"
        class="mt-8" />
    </div>
  </div>
</template>
