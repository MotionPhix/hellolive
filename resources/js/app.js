import './bootstrap';
import Alpine from 'alpinejs'
import persist from '@alpinejs/persist'
import focus from '@alpinejs/focus'
import intersect from '@alpinejs/intersect'
import { ZiggyVue } from 'ziggy-js';

import { createApp } from 'vue';
import {
  IconBrain, IconLocation, IconPhoneCall, IconMail
} from "@tabler/icons-vue"
import LocationTabs from "@/components/LocationTabs.vue";
import BillboardList from "@/components/billboards/BillboardList.vue";
import Pagination from "@/components/pagination.vue";
import ThemeSwitch from "@/components/ThemeSwitch.vue";
import AppLogo from "@/components/AppLogo.vue";
import ResponsiveNav from "@/components/ResponsiveNav.vue";
import FeatureCard from "@/components/FeatureCard.vue";

window.Alpine = Alpine

Alpine.plugin(persist)
Alpine.plugin(focus)
Alpine.plugin(intersect)

Alpine.start()

const app = createApp({});

app
  .use(ZiggyVue)
  .component('location-tabs', LocationTabs)
  .component('billboard-list', BillboardList)
  .component('pagination', Pagination)
  .component('theme-switch', ThemeSwitch)
  .component('app-logo', AppLogo)
  .component('responsive-nav', ResponsiveNav)
  .component('feature-card', FeatureCard)
  .component('brain-icon', IconBrain)
  .component('location-icon', IconLocation)
  .component('phone-icon', IconPhoneCall)
  .component('email-icon', IconMail)
  .mount('#app')
