<template>
    <div class="mt-5 hover:scale-105 transition-transform duration-300 w-52 p-6 bg-white rounded-lg shadow dark:bg-slate-200 dark:border-gray-700 ">
      <a :href="`/product/${product.id}`">
        <img class="w-full h-48" :src="product.image_url" alt="">
        <h6 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">{{ product.name }}</h6>
      </a>
      <p class="hover:scale-105 transition-transform duration-300 mb-3 text-sm font-normal text-gray-700 dark:text-gray-400">{{ product.category_id }}</p>
      <a :href="`/product/${product.id}`" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        Read more
        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
        </svg>
      </a>
    </div>
  </template>
  
  <script setup>
  import { defineProps } from 'vue';
  
  const props = defineProps({
    product: Object,
  });
  </script>
  
  <style scoped>

  </style>
  