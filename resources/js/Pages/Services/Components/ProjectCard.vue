<template>
    <div class="border rounded-lg overflow-hidden shadow-md">
      <!-- <img :src="projectImage" :alt="project.title" class="w-full h-48 object-cover"> -->
      <div class="p-4">
        <h3 class="font-bold text-lg">{{ project.title }}</h3>
        <p class="text-gray-600">{{ project.content }}</p>
        <p class="text-md font-semibold"></p>
      </div>
    </div>
  </template>
  
  <script setup>
  import { defineProps } from 'vue';
  
  const props = defineProps({
    project: {
      type: Object,
      required: true,
    },
  });
  
  // Assuming the project image URL is stored in the `image` attribute of the project object
  // const projectImage = computed(() => `/storage/${props.project.img_path}`);
  </script>
  
  <style scoped>
  .border {
    border: 1px solid #e2e8f0;
  }
  .rounded-lg {
    border-radius: 0.5rem;
  }
  .overflow-hidden {
    overflow: hidden;
  }
  .shadow-md {
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  }
  .p-4 {
    padding: 1rem;
  }
  .font-bold {
    font-weight: 700;
  }
  .text-lg {
    font-size: 1.125rem;
  }
  .text-gray-600 {
    color: #4a5568;
  }
  .object-cover {
    object-fit: cover;
  }
  .w-full {
    width: 100%;
  }
  .h-48 {
    height: 12rem;
  }
  </style>
  