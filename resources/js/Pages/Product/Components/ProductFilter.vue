<script setup>
import { defineProps, ref, watch, defineEmits } from 'vue';
import axios from 'axios';

const props = defineProps({
  categories: {
    type: Array,
    required: true,
    default: () => ['all']
  },
  initialProducts: {
    type: Array,
    required: true,
  },
});

const emit = defineEmits(['update-products']);
const selectedCategory = ref('all');

const fetchFilteredProduct = async (category) => {
  try {
    const response = await axios.get('/product', { params: { category } });
    console.log('Fetched products:', response.data);
    emit('update-products', response.data.products);
  } catch (error) {
    console.error('Error fetching products:', error);
  }
};

watch(selectedCategory, (newCategory) => {
  fetchFilteredProduct(newCategory);
});
</script>

<template>
  <div class="mt-10 ml-3">
    <select v-model="selectedCategory" class="rounded-lg shadow-md hover:bg-lime-500 hover:text-white">
      <option selected value="all">All Categories</option>
      <option  :value="category.id" v-for="category in categories" :key="category.id">{{ category.name }}</option>
    </select>
  </div>
</template>

<style scoped>
.category-item {

}
</style>
