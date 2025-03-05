<script setup lang="ts">
import { ref, computed } from 'vue';
import Button from './Button.vue';
import { useStorage } from '@vueuse/core'

const props = defineProps({
  initialBillboards: {
    type: Object,
    required: true
  }
});

const billboards = ref(props.initialBillboards);

const locations = ['malawi', 'zambia'];
const activeLocation = useStorage('location', 'zambia');

const setActiveLocation = (location) => {
  activeLocation.value = location;
};

const currentBillboards = computed(() => {
  return billboards.value[activeLocation.value] || [];
});
</script>

<template>
  <div class="space-y-12">
    <!-- Location Tabs -->
    <div class="flex justify-center space-x-4">
      <Button
        v-for="location in locations"
        :key="location"
        size="lg"
        :variant="activeLocation === location ? 'tab-active' : 'tab'"
        custom-class="rounded-full capitalize"
        @click="setActiveLocation(location)"
      >
        {{ location }}
      </Button>
    </div>

    <!-- Location Content -->
    <div class="grid grid-cols-1 gap-8 md:grid-cols-3">
      <div
        v-for="billboard in currentBillboards"
        :key="billboard.id"
        class="relative group">
        <div class="relative overflow-hidden rounded-2xl shadow-lg aspect-[4/3]">
          <img
            :src="billboard.image"
            :alt="billboard.name"
            class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500"
          >
          <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent"></div>
        </div>
        <div class="absolute bottom-0 left-0 right-0 p-6">
          <h3 class="text-xl font-bold text-white group-hover:text-indigo-300 transition-colors">
            {{ billboard.name }}
          </h3>
          <p class="text-sm text-gray-300">{{ billboard.city }}</p>
        </div>
        <a
          :href="billboard.url"
          class="absolute inset-0 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 rounded-2xl"
          :aria-label="`View details for ${billboard.name}`"
        ></a>
      </div>
    </div>
  </div>
</template>
