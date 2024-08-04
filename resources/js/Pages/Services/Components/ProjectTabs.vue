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
      <!-- Display projects based on the selected category -->
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div v-for="project in filteredProjects" :key="project.id" class="border rounded-lg overflow-hidden shadow-md">
          <!-- <img :src="`/storage/${project.image}`" :alt="project.name" class="w-full h-48 object-cover"> -->
          <div class="p-4">
            <h3 class="font-bold text-lg">{{ project.title }}</h3>
            <p class="text-gray-600">{{ project.content }}</p>
          </div>
        </div>
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
      projects: {
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
      filteredProjects() {
        if (this.selectedCategory === null) return this.projects;
        return this.projects.filter(project => project.category_id === this.selectedCategory);
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
