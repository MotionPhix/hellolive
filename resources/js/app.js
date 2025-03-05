import './bootstrap';
import Alpine from 'alpinejs'
import persist from '@alpinejs/persist'
import focus from '@alpinejs/focus'
import intersect from '@alpinejs/intersect'

import { createApp } from 'vue';
import LocationTabs from "@/components/LocationTabs.vue";
import BillboardList from "@/components/billboards/BillboardList.vue";
import Pagination from "@/components/pagination.vue";

window.Alpine = Alpine

Alpine.plugin(persist)
Alpine.plugin(focus)
Alpine.plugin(intersect)

// Define store before starting Alpine
Alpine.store('darkMode', {
  on: Alpine.$persist(false).as('darkMode'),
  toggle() {
    this.on = !this.on
    document.documentElement.classList.toggle('dark')
  }
})

Alpine.start()

const app = createApp({});

app
  .component('location-tabs', LocationTabs)
  .component('billboard-list', BillboardList)
  .component('pagination', Pagination)
  .mount('#app')
