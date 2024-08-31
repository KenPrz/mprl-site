<template>
  <div class="mt-5 hover:scale-105 transition-transform duration-300 w-full sm:w-auto p-6 bg-white rounded-lg hover:shadow-lg dark:bg-slate-200 dark:border">
    <a :href="`/product/${product.id}`" class="block relative group">
      <div class="relative">
        <img class="w-full h-48 object-cover" :src="product.first_image ? `/storage/${product.first_image.images}` : '/images/products-images/solarpanel.png'" alt="">
        <div class="absolute inset-0 flex items-end justify-center bg-gray-100/30 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
          <p class="text-white text-sm font-bold bg-green-600 px-10 py-2 rounded-lg">View Details</p>
        </div>
      </div>
      <h6 class="mt-2 mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white overflow-ellipsis overflow-hidden whitespace-nowrap hover:text-green-600">
        <span>{{ product.power_out }}W</span> {{ product.name }}
      </h6>
    </a>
    <p class="mb-3 text-sm font-normal text-gray-700 dark:text-gray-400">{{ product.supplier }} | {{ product.voltage }} V | {{ product.dimension }}</p>
  </div>
</template>

<script setup>
import { defineProps } from 'vue';
const props = defineProps({
  product: Object,
});
</script>

<style scoped>
  .group:hover .group-hover\:opacity-100 {
    opacity: 1;
  }
  .backdrop-blur-md {
    backdrop-filter: blur(10px);
  }
</style>
