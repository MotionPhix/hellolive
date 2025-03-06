<script setup lang="ts">
import {useDark} from "@vueuse/core";

const props = withDefaults(
  defineProps<{
    size: number
  }>(),
  {
    size: 10
  }
)

const isDark = useDark()
</script>

<template>
  <img
    v-if="isDark"
    :class="`h-${size} w-auto`"
    src="/firstmark_logo.svg"
    alt="Firstmark Advertising Logo">

  <img
    v-else
    :class="`h-${size} w-auto`"
    src="/firstmark_color_logo.svg"
    alt="Firstmark Advertising Logo">
</template>
