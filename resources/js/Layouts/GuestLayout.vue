<script setup>
import {defineProps} from 'vue';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    bgLink: {
        type: String,
        default: '/images/solar-header-bg.jpg'
    },
})
</script>

<template>
    <div
      id="layout"
      class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0"
      :style="`background-image: url('${props.bgLink}'); background-size: cover; background-position: center;`"
    >
    <div class="block sm:hidden my-5">
        <Link :href="route('welcome')">
        <ApplicationLogo class="w-auto h-24 fill-current text-gray-500 mx-auto" />
      </Link>
    </div>
      <div
        class="rounded-lg sm:w-full max-w-md sm:max-w-4xl bg-white shadow-lg overflow-hidden sm:rounded-lg mx-5"
      >
        <slot />
      </div>
    </div>
  </template>
<style scoped>
#layout {
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;
}
</style>
