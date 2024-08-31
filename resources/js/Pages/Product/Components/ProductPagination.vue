<template>
  <div class="flex justify-center mt-5">
    <button 
      :disabled="currentPage === 1" 
      @click="changePage(currentPage - 1)"
      class="px-4 py-2 mx-1 text-white bg-blue-500 rounded hover:bg-blue-600 disabled:opacity-50"
    >
      Previous
    </button>
    <button 
      v-for="page in totalPages" 
      :key="page" 
      @click="changePage(page)"
      :class="['px-4 py-2 mx-1', currentPage === page ? 'bg-blue-600 text-white' : 'bg-gray-300 text-gray-700']"
      class="rounded hover:bg-blue-600 hover:text-white"
    >
      {{ page }}
    </button>
    <button 
      :disabled="currentPage === totalPages" 
      @click="changePage(currentPage + 1)"
      class="px-4 py-2 mx-1 text-white bg-blue-500 rounded hover:bg-blue-600 disabled:opacity-50"
    >
      Next
    </button>
  </div>
</template>

<script setup>
import { ref } from 'vue';

const props = defineProps({
  currentPage: Number,
  totalPages: Number,
});

const emit = defineEmits(['page-changed']);

function changePage(page) {
  emit('page-changed', page);
}
</script>
