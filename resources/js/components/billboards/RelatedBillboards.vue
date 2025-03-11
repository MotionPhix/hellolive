<script setup>
import { ref } from 'vue';
import axios from 'axios';
import {
  IconMapPin,
  IconBuilding,
  IconEye,
  IconArrowRight
} from '@tabler/icons-vue';
import {
  Dialog,
  DialogContent,
  DialogHeader,
  DialogTitle,
  DialogDescription,
  DialogFooter,
} from '@/components/ui/dialog';
import { Button } from '@/components/ui/button';
import { Badge } from '@/components/ui/badge';

const props = defineProps({
  relatedBillboards: {
    type: Array,
    required: true
  }
});

const isOpen = ref(false);
const selectedBillboard = ref(null);
const isLoading = ref(false);

const openQuickView = (billboard) => {
  selectedBillboard.value = billboard;
  isOpen.value = true;
};

const closeQuickView = () => {
  isOpen.value = false;
};

const requestQuote = async (billboard) => {
  isLoading.value = true;

  try {
    const response = await axios.post(route('quote.store'), {
      billboard_id: billboard.id
    });

    // Redirect to the quote page or handle success
    window.location.href = route('quote.show', response.data.quote.id);
  } catch (error) {
    console.error('Failed to create quote:', error);
    // Handle error - you might want to show a toast notification here
  } finally {
    isLoading.value = false;
  }
};

const formatCurrency = (amount) => {
  return new Intl.NumberFormat('en-MW', {
    style: 'currency',
    currency: 'MWK'
  }).format(amount);
};

const getStatusColor = (status) => {
  switch (status) {
    case 'available':
      return 'success';
    case 'occupied':
      return 'destructive';
    case 'maintenance':
      return 'warning';
    default:
      return 'secondary';
  }
};
</script>

<template>
  <section
    v-if="relatedBillboards.length"
    class="mt-12 px-4 sm:px-6 lg:px-8">
    <!-- Section Header -->
    <div class="max-w-7xl mx-auto">
      <div class="flex items-center justify-between mb-8">
        <div>
          <h2 class="text-2xl font-bold tracking-tight">
            Related Billboards
          </h2>
          <p class="mt-2 text-sm text-muted-foreground">
            Other billboards you might be interested in
          </p>
        </div>

        <Button variant="link" :href="route('billboards.index')" class="group">
          View all
          <IconArrowRight
            class="ml-2 w-4 h-4 transition-transform group-hover:translate-x-1"
          />
        </Button>
      </div>

      <!-- Billboard Cards Grid -->
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-x-6 gap-y-8">
        <div
          v-for="billboard in relatedBillboards"
          :key="billboard.id"
          class="group relative bg-background rounded-lg border shadow-sm hover:shadow transition-shadow duration-200"
        >
          <!-- Image Container -->
          <div class="aspect-[16/9] relative overflow-hidden rounded-t-lg">
            <img
              :src="billboard.featured_image"
              :alt="billboard.name"
              class="object-cover w-full h-full transition-transform duration-300 group-hover:scale-105">
            <!-- Status Badge -->
            <Badge
              :variant="getStatusColor(billboard.status)"
              class="absolute top-4 right-4">
              {{ billboard.status }}
            </Badge>
          </div>

          <!-- Content -->
          <div class="p-4 space-y-4">
            <!-- Price Tag -->
            <div class="inline-flex px-3 py-1 rounded-full bg-primary/10 text-primary">
              <span class="text-sm font-semibold">
                {{ formatCurrency(billboard.monthly_rate) }}/month
              </span>
            </div>

            <!-- Title and Location -->
            <div>
              <h3 class="font-semibold group-hover:text-primary transition-colors line-clamp-1">
                <a :href="route('billboards.show', billboard.id)">
                  {{ billboard.name }}
                </a>
              </h3>
              <p class="mt-1 text-sm text-muted-foreground line-clamp-1">
                {{ billboard.location }}, {{ billboard.city }}
              </p>
            </div>

            <!-- Quick Actions -->
            <div class="flex items-center justify-between pt-2 border-t border-border">
              <div class="flex items-center gap-4 text-sm text-muted-foreground">
                <span class="inline-flex items-center gap-1">
                  <IconMapPin class="w-4 h-4" />
                  <span class="hidden sm:inline">{{ billboard.city }}</span>
                </span>
                <span class="inline-flex items-center gap-1">
                  <IconBuilding class="w-4 h-4" />
                  <span class="hidden sm:inline">{{ billboard.type }}</span>
                </span>
              </div>

              <Button
                variant="ghost"
                size="icon"
                @click="openQuickView(billboard)"
                class="ml-auto"
              >
                <IconEye class="w-5 h-5" />
              </Button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Quick View Dialog -->
    <Dialog :open="isOpen" @update:open="closeQuickView">
      <DialogContent class="sm:max-w-3xl">
        <DialogHeader>
          <DialogTitle>{{ selectedBillboard?.name }}</DialogTitle>
          <DialogDescription>
            {{ selectedBillboard?.location }}, {{ selectedBillboard?.city }}
          </DialogDescription>
        </DialogHeader>

        <div v-if="selectedBillboard" class="space-y-6">
          <!-- Image -->
          <div class="aspect-video overflow-hidden rounded-lg">
            <img
              :src="selectedBillboard.featured_image"
              :alt="selectedBillboard.name"
              class="w-full h-full object-cover"
            >
          </div>

          <!-- Details Grid -->
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="space-y-4">
              <Badge :variant="getStatusColor(selectedBillboard.status)">
                {{ selectedBillboard.status }}
              </Badge>

              <div class="space-y-2">
                <p class="text-sm text-muted-foreground">Dimensions</p>
                <p class="text-lg font-semibold">
                  {{ selectedBillboard.dimensions.width }}m × {{ selectedBillboard.dimensions.height }}m
                </p>
              </div>
            </div>

            <div class="space-y-4">
              <div class="p-4 rounded-lg bg-muted">
                <p class="text-sm text-muted-foreground">Monthly Rate</p>
                <p class="text-2xl font-bold text-primary">
                  {{ formatCurrency(selectedBillboard.monthly_rate) }}
                </p>
              </div>
            </div>
          </div>
        </div>

        <DialogFooter>
          <Button variant="outline" @click="closeQuickView">Close</Button>
          <Button
            @click="requestQuote(selectedBillboard)"
            :disabled="isLoading">
            {{ isLoading ? 'Processing...' : 'Request Quote' }}
          </Button>
        </DialogFooter>
      </DialogContent>
    </Dialog>
  </section>
</template>
