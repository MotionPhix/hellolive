<script setup lang="ts">
import { ref, onMounted } from 'vue'
import { Swiper, SwiperSlide } from 'swiper/vue'
import { Navigation, Pagination, Keyboard, Autoplay } from 'swiper/modules'
import 'swiper/css'
import 'swiper/css/navigation'
import 'swiper/css/pagination'
import 'leaflet/dist/leaflet.css'
import L from 'leaflet'
import QuoteRequestModal from "@/components/billboards/QuoteRequestModal.vue";
import {IconBrandWhatsapp} from "@tabler/icons-vue";

// Fix for Leaflet's default icon path issues
delete (L.Icon.Default.prototype as any)._getIconUrl

L.Icon.Default.mergeOptions({
  iconRetinaUrl: '/images/vendor/leaflet/dist/marker-icon-2x.png',
  iconUrl: '/images/vendor/leaflet/dist/marker-icon.png',
  shadowUrl: '/images/vendor/leaflet/dist/marker-shadow.png',
})

const props = defineProps<{
  billboard: {
    id: number
    uuid: string
    name: string
    location: string
    city: string
    state: string
    country: string
    status: string
    description: string | null
    dimensions: {
      width: number
      height: number
    }
    latitude: number
    longitude: number
    monthly_rate: string
    type: string
    is_available: boolean
    media: Array<{
      id: number
      preview_url: string
      original_url: string
    }>
  }
  relatedBillboards?: Array<{
    id: number
    uuid:string
    name: string
    location: string
    city: string
    monthly_rate: string
    is_available: boolean
    media: Array<{
      preview_url: string
    }>
  }>
}>()

const activeImage = ref(props.billboard.media[0]?.original_url || '')
const showGallery = ref(false)
const galleryIndex = ref(0)
const mapContainer = ref<HTMLElement | null>(null)
let map: L.Map | null = null

const formatPrice = (price: string) => {
  return new Intl.NumberFormat('en-MW', {
    style: 'currency',
    currency: 'MWK'
  }).format(Number(price))
}

const openGallery = (index: number) => {
  galleryIndex.value = index
  showGallery.value = true
}

onMounted(() => {
  if (mapContainer.value && !map) {
    // Initialize the map
    map = L.map(mapContainer.value).setView(
      [props.billboard.latitude, props.billboard.longitude],
      15
    )

    // Add OpenStreetMap tiles
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      maxZoom: 19,
      attribution: '© OpenStreetMap contributors'
    }).addTo(map)

    // Add marker for the billboard location
    const marker = L.marker([props.billboard.latitude, props.billboard.longitude])
      .addTo(map)
      .bindPopup(`
        <strong>${props.billboard.name}</strong><br>
        ${props.billboard.location}
      `)
      .openPopup()

    // Ensure map updates when container size changes
    const resizeObserver = new ResizeObserver(() => {
      map?.invalidateSize()
    })
    resizeObserver.observe(mapContainer.value)
  }
})
</script>

<template>
  <div class="min-h-screen bg-gray-50 dark:bg-gray-900">
    <!-- Hero Section -->
    <div class="relative bg-white dark:bg-gray-800 overflow-hidden">
      <div class="max-w-7xl mx-auto">
        <div class="relative z-10 pb-8 bg-white dark:bg-gray-800 sm:pb-16 md:pb-20 lg:w-full lg:pb-28 xl:pb-32">
          <div class="mt-10 mx-auto max-w-7xl px-4 sm:mt-12 sm:px-6 md:mt-16 lg:mt-20 lg:px-8 xl:mt-28">
            <div class="sm:text-center lg:text-left">
              <h1 class="text-4xl tracking-tight font-bold text-gray-900 dark:text-white sm:text-5xl md:text-6xl">
                <span class="block xl:inline">{{ billboard.name }}</span>
              </h1>
              <p class="mt-3 text-base text-gray-500 dark:text-gray-400 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
                {{ billboard.location }}
              </p>

              <!-- Status Badge -->
              <div class="mt-4">
                <span
                  class="inline-flex items-center px-3 py-0.5 rounded-full text-sm font-medium"
                  :class="{
                    'bg-green-100 text-green-800 dark:bg-green-800 dark:text-green-100': billboard.is_available,
                    'bg-red-100 text-red-800 dark:bg-red-800 dark:text-red-100': !billboard.is_available
                  }">
                  {{ billboard.is_available ? 'Available' : 'Booked' }}
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
      <div class="lg:grid lg:grid-cols-2 lg:gap-x-8 lg:items-start">
        <!-- Image gallery -->
        <div class="flex flex-col">
          <div class="relative">
            <!-- Main Swiper -->
            <Swiper
              :modules="[Navigation, Pagination, Keyboard, Autoplay]"
              :slides-per-view="1"
              :space-between="10"
              :navigation="true"
              :pagination="{ clickable: true }"
              :keyboard="{ enabled: true }"
              :autoplay="{ delay: 5000, disableOnInteraction: false }"
              class="aspect-w-16 aspect-h-9 w-full overflow-hidden rounded-lg">
              <SwiperSlide
                v-for="(image, index) in billboard.media"
                :key="image.id"
                class="relative">
                <img
                  :src="image.original_url"
                  :alt="`${billboard.name} - Image ${index + 1}`"
                  class="w-full h-full object-cover cursor-pointer"
                  @click="openGallery(index)">
              </SwiperSlide>
            </Swiper>

            <!-- Thumbnails -->
            <div class="mt-4 grid grid-cols-4 gap-4">
              <button
                v-for="(image, index) in billboard.media"
                :key="image.id"
                @click="galleryIndex = index"
                class="relative aspect-w-1 aspect-h-1 overflow-hidden rounded-lg">
                <img
                  :src="image.preview_url"
                  :alt="`${billboard.name} - Thumbnail ${index + 1}`"
                  class="w-full h-full object-cover"
                  :class="{
                    'ring-2 ring-offset-2 ring-indigo-500 dark:ring-indigo-400': galleryIndex === index
                  }">
              </button>
            </div>
          </div>
        </div>

        <!-- Billboard info -->
        <div class="mt-10 px-4 sm:px-0 sm:mt-16 lg:mt-0">
          <div class="space-y-6">
            <!-- Location Details -->
            <div class="flex flex-col space-y-2">
              <div class="flex items-center text-sm text-gray-500 dark:text-gray-400">
                <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                {{ billboard.city }}, {{ billboard.state }}, {{ billboard.country }}
              </div>
            </div>

            <!-- Dimensions -->
            <div class="border-t border-gray-200 dark:border-gray-700 pt-6">
              <h3 class="text-sm font-medium text-gray-900 dark:text-gray-100">Dimensions</h3>
              <div class="mt-4 space-y-2">
                <p class="text-sm text-gray-600 dark:text-gray-400">
                  Width: {{ billboard.dimensions.width }}m × Height: {{ billboard.dimensions.height }}m
                </p>
              </div>
            </div>

            <!-- Monthly Rate -->
            <div class="border-t border-gray-200 dark:border-gray-700 pt-6">
              <h3 class="text-sm font-medium text-gray-900 dark:text-gray-100">Monthly Rate</h3>
              <p class="mt-2 text-3xl font-bold text-gray-900 dark:text-white">
                {{ formatPrice(billboard.monthly_rate) }}
              </p>
            </div>

            <!-- Description -->
            <div class="border-t border-gray-200 dark:border-gray-700 pt-6">
              <h3 class="text-sm font-medium text-gray-900 dark:text-gray-100">Description</h3>
              <div class="mt-4 prose prose-sm text-gray-500 dark:text-gray-400">
                {{ billboard.description || 'No description available.' }}
              </div>
            </div>

            <!-- Action Buttons -->
<!--            <div class="border-t border-gray-200 dark:border-gray-700 pt-6">-->
<!--              <div class="flex space-x-4">-->
<!--                <a-->
<!--                  :href="`https://wa.me/+265996727163?text=Hi, I'm interested in the ${billboard.name} billboard located at ${billboard.location}.`"-->
<!--                  target="_blank"-->
<!--                  class="flex-1 bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-md text-sm font-semibold text-center">-->
<!--                  WhatsApp-->
<!--                </a>-->

<!--                <button-->
<!--                  class="flex-1 bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3 rounded-md text-sm font-semibold">-->
<!--                  Request Quote-->
<!--                </button>-->
<!--              </div>-->
<!--            </div>-->

            <div class="border-t border-gray-200 dark:border-gray-700 pt-6">
              <div class="flex gap-4">
                <Button
                  class="flex-1" size="lg"
                  :href="`https://wa.me/+265996727163?text=Hi, I'm interested in the ${billboard.name} billboard located at ${billboard.location}.`"
                  target="_blank">
                  <IconBrandWhatsapp />
                  WhatsApp
                </Button>

                <QuoteRequestModal
                  :billboard="billboard"
                />
              </div>
            </div>

          </div>
        </div>
      </div>

      <!-- Map Section -->
      <div class="mt-16 border-t border-gray-200 dark:border-gray-700 pt-8">
        <h2 class="text-xl font-bold text-gray-900 dark:text-white mb-6 font-display">Location</h2>

        <div
          ref="mapContainer"
          class="h-[425px] rounded-lg overflow-hidden z-20"
        />
      </div>

      <!-- Related Billboards Section -->
      <section class="mt-16 border-t border-gray-200 dark:border-gray-700 pt-8">
        <div class="space-y-6">
          <div class="flex items-center justify-between">
            <h2 class="text-xl font-bold text-gray-900 dark:text-white">
              Related Billboards
            </h2>
            <Button variant="outline" :href="route('billboards.index')">
              View All
            </Button>
          </div>

          <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div
              v-for="related in relatedBillboards"
              :key="related.id"
              class="group relative bg-white dark:bg-gray-800 rounded-lg shadow-sm overflow-hidden hover:shadow-lg transition-shadow duration-300"
            >
              <!-- Thumbnail -->
              <div class="aspect-w-16 aspect-h-9">
                <img
                  :src="related.media[0]?.preview_url || '/images/placeholder.jpg'"
                  :alt="related.name"
                  class="object-cover group-hover:scale-105 transition-transform duration-300">

                <div
                  v-if="!related.is_available"
                  class="absolute right-0 top-0">
                <span class="px-4 py-2 bg-red-500 text-white rounded-bl-lg text-sm font-semibold">
                  Booked
                </span>
                </div>
              </div>

              <!-- Content -->
              <div class="p-4">
                <h3 class="font-semibold text-gray-900 dark:text-white">
                  {{ related.name }}
                </h3>

                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                  {{ related.location }}
                </p>

                <div class="mt-4 flex items-center justify-between">
                <span class="text-lg font-medium text-gray-900 dark:text-white">
                  {{ formatPrice(related.monthly_rate) }}
                </span>

                  <Button
                    variant="outline"
                    size="sm"
                    :href="route('billboards.show', related.uuid)">
                    View Details
                  </Button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>
  </div>
</template>

<style>
.swiper {
  @apply w-full h-full;
}

.swiper-button-next,
.swiper-button-prev {
  @apply text-white bg-black/50 rounded-full w-10 h-10 transition-colors duration-200;
}

.swiper-button-next:hover,
.swiper-button-prev:hover {
  @apply bg-black/75;
}

.swiper-button-next::after,
.swiper-button-prev::after {
  @apply text-lg;
}

.swiper-pagination-bullet {
  @apply bg-white/70;
}

.swiper-pagination-bullet-active {
  @apply bg-white;
}

/* Dark mode adjustments */
.dark .swiper-button-next,
.dark .swiper-button-prev {
  @apply text-gray-100 bg-gray-800/50;
}

.dark .swiper-button-next:hover,
.dark .swiper-button-prev:hover {
  @apply bg-gray-800/75;
}

.dark .swiper-pagination-bullet {
  @apply bg-gray-400/70;
}

.dark .swiper-pagination-bullet-active {
  @apply bg-gray-300;
}

/* Add smooth transitions for dark mode */
.dark-mode-transition {
  @apply transition-colors duration-200;
}

/* Enhanced card hover effects */
.billboard-card {
  @apply transform transition-all duration-300 hover:-translate-y-1 hover:shadow-xl;
}

/* Add Leaflet specific styles */
.leaflet-container {
  @apply bg-gray-100 dark:bg-gray-800;
}

.leaflet-popup-content-wrapper {
  @apply bg-white dark:bg-gray-800 shadow-lg;
}

.leaflet-popup-content {
  @apply text-gray-900 dark:text-white p-2;
}

.leaflet-popup-tip {
  @apply bg-white dark:bg-gray-800;
}

.leaflet-control-zoom a {
  @apply bg-white dark:bg-gray-800 text-gray-900 dark:text-white border-gray-300 dark:border-gray-600;
}

.leaflet-control-zoom a:hover {
  @apply bg-gray-100 dark:bg-gray-700;
}

/* Fix for marker icon display issues */
.leaflet-default-icon-path {
  background-image: url('/images/vendor/leaflet/dist/marker-icon.png');
}
</style>
