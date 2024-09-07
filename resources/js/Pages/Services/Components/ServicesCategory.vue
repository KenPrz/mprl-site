<script setup>
import { defineProps, ref } from 'vue';

const props = defineProps({
  servicesCategory: {
    type: Array,
    default: () => ['all'],
    required: true,
  },
});

const selectedCategory = ref(null);

const selectCategory = (categoryId) => {
  selectedCategory.value = categoryId;
  const section = document.getElementById(categoryId);
  if (section) {
    section.scrollIntoView({ behavior: 'smooth' });
  }
};
</script>

<template>
  <div class="mt-2 ml-3">
    <ul class="list-none p-0 hidden sm:block">
      <!-- Loop through the services category list -->
      <li v-for="service in servicesCategory" :key="service.id">
        <button
          @click="selectCategory(service.service_category)"
          class="w-5/6 text-start rounded-lg shadow-md px-4 py-2 m-1 hover:bg-blue-600 hover:text-white"
          :class="{
            'bg-blue-700 text-white': selectedCategory === service.service_category,
            'bg-gray-200': selectedCategory !== service.service_category
          }"
        >
          {{ service.service_category }}
        </button>
      </li>
    </ul>
  </div>
</template>

<style scoped>
button {
  transition: background-color 0.3s, color 0.3s;
}
</style>
