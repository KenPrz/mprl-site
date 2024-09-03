<script setup>
import { defineProps, ref } from 'vue';

// Define props to receive the services category list
const props = defineProps({
  servicesCategory: {
    type: Array,
    default: () => ['all'],
    required: true,
  },
});

// State to track the selected category
const selectedCategory = ref(null);

// Function to handle category selection
const selectCategory = (categoryId) => {
  selectedCategory.value = categoryId;
};
</script>

<template>
  <div class="mt-2 ml-3">
    <ul class="list-none p-0 hidden sm:block">
      <!-- Loop through the services category list -->
      <li v-for="service in servicesCategory" :key="service.id">
        <a :href="'#' + service.service_category">
          <!-- Button to select the category -->
          <button 
            @click="selectCategory(service.id)" 
            class="w-5/6 text-start rounded-lg shadow-md px-4 py-2 m-1 bg-gray-200 hover:bg-blue-600 hover:text-white"
            :class="{'bg-blue-700 text-white hover:bg-gray-200': selectedCategory === service.id}">
            {{ service.service_category }}
          </button>
        </a>
      </li>
    </ul>
  </div>
</template>

<style scoped>
button {
  transition: background-color 0.3s, color 0.3s;
}
</style>
