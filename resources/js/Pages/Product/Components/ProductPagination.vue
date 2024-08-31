<template>
    <div class="flex items-center space-x-2 mt-5">
      <button
        @click="prevPage"
        :disabled="currentPage === 1"
        class="py-2 px-4 bg-gray-200 rounded-md hover:bg-gray-300 disabled:opacity-50 disabled:cursor-not-allowed"
      >
        Prev
      </button>
  
      <button
        v-for="page in pages"
        :key="page"
        @click="changePage(page)"
        :class="{
          'bg-green-500 text-white': page === currentPage,
          'bg-gray-200': page !== currentPage,
        }"
        class="py-2 px-4 rounded-md hover:bg-gray-300"
      >
        {{ page }}
      </button>
  
      <button
        @click="nextPage"
        :disabled="currentPage === totalPages"
        class="py-2 px-4 bg-gray-200 rounded-md hover:bg-gray-300 disabled:opacity-50 disabled:cursor-not-allowed"
      >
        Next
      </button>
    </div>
  </template>
  
  <script setup>
  import { ref, computed } from 'vue';
  
  const props = defineProps({
    totalItems: {
      type: Number,
      required: true,
    },
    itemsPerPage: {
      type: Number,
      default: 10,
    },
  });
  
  const currentPage = ref(1);
  const totalPages = computed(() => Math.ceil(props.totalItems / props.itemsPerPage));
  
  const pages = computed(() => {
    let pageArray = [];
    for (let i = 1; i <= totalPages.value; i++) {
      pageArray.push(i);
    }
    return pageArray;
  });
  
  const changePage = (page) => {
    if (page >= 1 && page <= totalPages.value) {
      currentPage.value = page;
      // Emit the current page to the parent component
      emit('updatePage', currentPage.value);
    }
  };
  
  const prevPage = () => {
    if (currentPage.value > 1) {
      changePage(currentPage.value - 1);
    }
  };
  
  const nextPage = () => {
    if (currentPage.value < totalPages.value) {
      changePage(currentPage.value + 1);
    }
  };
  </script>
  
  <style scoped>
    button:focus {
      outline: none;
    }
  </style>
  