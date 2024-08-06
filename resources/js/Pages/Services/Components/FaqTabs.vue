<template>
    <div>
      <div class="flex border-b-2 justify-center text-lg gap-10">
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
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
          <div v-for="project in filteredProjects" :key="project.id" class="overflow-hidden">
            <img :src="project.first_image ? `/storage/${project.first_image.images}` : '/images/products-images/solarpanel.png'" class="w-full h-48 object-cover rounded-2xl">
            <div class="mt-5">
              <h3 class="font-bold text-lg text-blue-500">{{ project.title }}</h3>
              <div class="flex">
                <p class="text-blue-600 font-semibold text-sm">System Size: <span class="text-orange-500">{{ project.system_size }}</span></p>
                <p class="text-blue-600 font-semibold text-sm ml-5">Monthly Saving: <span class="text-orange-500">{{ project.monthly_saving }}</span></p>
              </div>
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
    }
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
  