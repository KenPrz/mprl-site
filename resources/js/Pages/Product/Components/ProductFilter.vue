<script setup>
import { defineProps, ref, defineEmits, onMounted } from 'vue';
import axios from 'axios';

const props = defineProps({
  categories: {
    type: Array,
    default: () => ['all'],
    required: true,
  },
});

const emit = defineEmits(['update-products']);
const selectedCategory = ref('all'); // Ensure 'all' is the initial default

const fetchFilteredProduct = async (category) => {
  try {
    const response = await axios.get('/product', { params: { category } });
    emit('update-products', response.data.products);
  } catch (error) {
    console.error(error);
  }
};

const selectCategory = (categoryId) => {
  selectedCategory.value = categoryId;
  fetchFilteredProduct(categoryId);
};

onMounted(() => {
  fetchFilteredProduct('all');
});
</script>

<template>
  <div class="mt-2 ml-3">
    <ul class="list-none p-0 hidden sm:block">
      <li>
        <button 
          @click="selectCategory('all')" 
          class="w-5/6 text-start rounded-lg shadow-md px-4 py-2 m-1 hover:bg-blue-600 hover:text-white"
          :class="{'bg-blue-600 text-white': selectedCategory === 'all', 'bg-gray-200': selectedCategory !== 'all'}">
          All Categories
        </button>
      </li>
      <li v-for="category in categories" :key="category.id">
        <button 
          @click="selectCategory(category.id)" 
          class="w-5/6 text-start rounded-lg shadow-md px-4 py-2 m-1 hover:bg-blue-600 hover:text-white"
          :class="{'bg-blue-600 text-white': selectedCategory === category.id, 'bg-gray-200': selectedCategory !== category.id}">
          {{ category.name }}
        </button>
      </li>
    </ul>
    <select 
      class="block lg:hidden w-full text-left py-2 px-4 bg-blue-600 text-white rounded-md" 
      @change="selectCategory($event.target.value)"
    >
      <option 
        value="all" 
        :selected="selectedCategory === 'all'"
        class="bg-gray-200 hover:text-white hover:bg-blue-600"
      >
        All Categories
      </option>
      <option 
        v-for="category in categories" 
        :value="category.id" 
        :selected="selectedCategory === category.id"
        class="bg-gray-200 hover:text-white hover:bg-blue-600"
      >
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
