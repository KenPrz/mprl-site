<template>
    <div>
      <div class="flex border-b-2">
        <div
          v-for="category in projectCategory"
          :key="category.id"
          @click="selectCategory(category.id)"
          :class="['cursor-pointer px-4 py-2', selectedCategory === category.id ? 'active-tab' : 'inactive-tab']"
        >
          {{ category.name }}
        </div>
      </div>
      <div class="mt-5">
        <!-- Display services or content based on the selected category -->
        <div v-for="service in filteredServices" :key="service.id">
          <h3>{{ service.name }}</h3>
          <p v-html="service.description"></p>
        </div>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    props: {
      projectCategory: {
        type: Array,
        default: () => [],
        required: true,
      },
      services: {
        type: Array,
        default: () => [],
        required: true,
      },
    },
    data() {
      return {
        selectedCategory: null,
      };
    },
    computed: {
      filteredServices() {
        if (this.selectedCategory === null) return this.services;
        return this.services.filter(service => service.category_id === this.selectedCategory);
      },
    },
    mounted() {
      // Select the first category by default
      if (this.projectCategory.length > 0) {
        this.selectedCategory = this.projectCategory[0].id;
      }
    },
    methods: {
      selectCategory(categoryId) {
        this.selectedCategory = categoryId;
      },
    },
  };
  </script>
  
  <style>
  .active-tab {
    font-weight: bold;
    color: #003e57; /* Change to desired color */
    border-bottom: 2px solid #00b050; /* Change to desired underline color */
  }
  .inactive-tab {
    color: #c0c0c0; /* Greyed out color */
  }
  </style>
  