<script setup lang="ts">
import {ref} from "vue";
import AppLogo from "@/components/AppLogo.vue";
import ThemeSwitch from "@/components/ThemeSwitch.vue";
import NavLink from "@/components/NavLink.vue";

const showMenu = ref(false)
</script>

<template>
  <section class="border-b border-gray-200 dark:border-gray-700 w-full sticky top-0 z-50 bg-white dark:bg-gray-800">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <nav class="h-16 select-none relative">
        <div
          class="relative flex flex-wrap items-center justify-between h-16 mx-auto overflow-hidden font-medium md:overflow-visible lg:justify-center sm:px-4 md:px-2 lg:px-0">
          <div class="flex items-center justify-start w-1/4 h-full pr-4">
            <a
              :href="route('home')"
              class="flex items-center py-4 space-x-2 font-extrabold text-gray-900 md:py-0">
              <span class="flex items-center justify-center shrink-0">
                <AppLogo />
              </span>
            </a>
          </div>

          <div
            class="top-0 left-0 items-start w-full h-full p-4 text-sm bg-gray-900 bg-opacity-50 md:items-center md:w-3/4 md:absolute lg:text-base md:bg-transparent md:p-0 md:relative md:flex"
            :class="{'flex fixed': showMenu, 'hidden': !showMenu }"
            @click="showMenu = !showMenu">
            <div
              class="flex-col w-full h-auto overflow-hidden bg-white rounded-lg md:bg-transparent md:overflow-visible md:rounded-none md:relative md:flex md:flex-row">
              <a
                :href="route('home')"
                class="inline-flex items-center block w-auto h-16 px-6 text-xl font-black leading-none text-gray-900 md:hidden">
                <AppLogo />
              </a>

              <div
                class="flex flex-col items-start justify-center w-full space-x-6 text-center lg:space-x-8 md:w-2/3 md:mt-0 md:flex-row md:items-center">
                <NavLink
                  :href="route('home')"
                  activePath="home">
                  Home
                </NavLink>

                <NavLink
                  :href="route('billboards.index')"
                  activePath="billboards.*">
                  Billboards
                </NavLink>

                <NavLink
                  :href="route('about')"
                  activePath="about">
                  Company
                </NavLink>

                <NavLink
                  :href="route('contact.index')"
                  activePath="contact.*">
                  Contact
                </NavLink>

                <div
                   class="absolute top-0 left-0 hidden py-2 mt-6 ml-10 mr-2 text-gray-600 lg:inline-block md:mt-0 md:ml-2 lg:mx-3 md:relative">
                  <!--svg
                    class="inline w-5 h-5" fill="none"
                    stroke-linecap="round" stroke-linejoin="round"
                    stroke-width="2"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                  </svg-->
                  <ThemeSwitch />
                </div>
              </div>

              <div
                class="flex flex-col items-start justify-end w-full pt-4 md:items-center md:w-1/3 md:flex-row md:py-0">
                <a
                  href="#"
                  class="w-full px-6 py-2 mr-0 text-gray-700 md:px-3 md:mr-2 lg:mr-3 md:w-auto">
                  Sign In
                </a>

                <a
                  :href="route('contact.index')"
                  class="inline-flex items-center w-full px-6 py-3 text-sm font-bold leading-4 text-white bg-gray-900 md:w-auto md:rounded-full hover:bg-gray-800 dark:bg-gray-200 dark:hover:bg-gray-100 focus:outline-none dark:text-gray-700 dark:hover:text-gray-900">
                  Get Started
                </a>
              </div>
            </div>
          </div>

          <div
            @click="showMenu = !showMenu"
            class="absolute right-0 flex flex-col items-end justify-center w-10 h-10 bg-white rounded-full cursor-pointer md:hidden hover:bg-gray-100">
            <svg class="w-6 h-6 text-gray-700" v-if="!showMenu" fill="none" stroke-linecap="round"
                 stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
              <path d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>

            <svg class="w-6 h-6 text-gray-700" v-if="showMenu" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                 xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
          </div>
        </div>
      </nav>
    </div>
  </section>
</template>
