<script setup>
import { defineProps, ref, defineEmits } from 'vue';
import axios from 'axios';

const props = defineProps({
  categories: {
    type: Array,
    default: () => ['all'],
    required: true,
    
  },
});

const emit = defineEmits(['update-products']);
const selectedCategory = ref('all');

const fetchFilteredProduct = async (category) => {
  try {
    const response = await axios.get('/product', { params: { category } });
    console.log('Fetched products:', response.data.products);
    emit('update-products', response.data.products);
  } catch (error) {
    console.error('Error fetching products:', error);
  }
};

const selectCategory = (categoryId) => {
  selectedCategory.value = categoryId;
  fetchFilteredProduct(categoryId);
};
</script>

<template>
  <div class="mt-10 ml-3">
    <ul class="list-none p-0 hidden sm:block">
      <li>
        <button 
          @click="selectCategory('all')" 
          class="w-5/6 text-start rounded-lg shadow-md px-4 py-2 m-1 bg-gray-200 hover:bg-lime-600 hover:text-white"
          :class="{'bg-lime-600 text-white': selectedCategory === 'all'}">
          All Categories
        </button>
      </li>
      <li v-for="category in categories" :key="category.id">
        <button 
          @click="selectCategory(category.id)" 
          class="w-5/6 text-start rounded-lg shadow-md px-4 py-2 m-1 bg-gray-200 hover:bg-lime-600 hover:text-white"
          :class="{'bg-lime-600 text-white': selectedCategory === category.id}">
          {{ category.name }}
        </button>
      </li>
    </ul>
    <select class="block sm:hidden w-full p-2 rounded-lg shadow-md mt-3 border ml-10 border-lime-500" @change="selectCategory($event.target.value)">
      <option value="all" :selected="selectedCategory === 'all'">All Categories</option>
      <option v-for="category in categories" :value="category.id" :selected="selectedCategory === category.id">
        {{ category.name }}
      </option>
    </select>
  </div>
</template>

<style scoped>
button {
  transition: background-color 0.3s, color 0.3s;
}
</style>
