<script setup lang="ts">
import { ref, computed, onMounted } from 'vue'
import { TransitionRoot } from '@headlessui/vue'
import Pagination from '../Pagination.vue'

const props = defineProps({
  initialBillboards: {
    type: Array,
    required: true
  },
  initialCountries: {
    type: Array,
    required: true
  },
  initialCities: {
    type: Array,
    required: true
  },
  initialTypes: {
    type: Array,
    required: true
  },
  initialFilters: {
    type: Object,
    required: true
  },
  links: {
    type: Array,
    required: true
  }
})

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
              <select v-model="filters.country"
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
              <select v-model="filters.city"
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
              <select v-model="filters.type"
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
            <button v-if="isFiltered"
                    @click="clearFilters"
                    class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
              Clear Filters
            </button>

            <a
              href="/contact"
               class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
              Contact Us
            </a>
          </div>
        </div>
      </div>

      <!-- Billboards Grid -->
      <div v-else class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <div v-for="billboard in billboards"
             :key="billboard.id"
             class="group relative bg-white rounded-lg shadow-sm hover:shadow-lg transition-shadow duration-300 overflow-hidden">
          <!-- Image -->
          <div class="aspect-w-16 aspect-h-9 relative">
            <img :src="billboard.image_url"
                 :alt="billboard.name"
                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
            <div v-if="!billboard.is_available"
                 class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center">
              <span class="px-4 py-2 bg-red-500 text-white rounded-full text-sm font-semibold">
                Booked
              </span>
            </div>
          </div>

          <!-- Content -->
          <div class="p-6">
            <div class="flex items-start justify-between">
              <div>
                <h3 class="text-lg font-semibold text-gray-900">{{ billboard.name }}</h3>
                <p class="mt-1 text-sm text-gray-500">{{ billboard.city }}, {{ billboard.country }}</p>
              </div>
              <span :class="[
                'inline-flex items-center px-3 py-1 rounded-full text-sm font-medium',
                billboard.is_available ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800'
              ]">
                {{ billboard.type }}
              </span>
            </div>

            <div class="mt-4 flex items-center justify-between">
              <div>
                <span class="text-2xl font-bold text-indigo-600">${{ formatPrice(billboard.price) }}</span>
                <span class="text-sm text-gray-500">/month</span>
              </div>
              <a
                :href="`billboards/${billboard.id}`"
                 class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                View Details
                <svg class="ml-2 -mr-1 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
              </a>
            </div>
          </div>
        </div>
      </div>

      <!-- Pagination -->
      <pagination v-if="billboards.length"
                  :links="links"
                  class="mt-8" />
    </div>
  </div>
</template>
