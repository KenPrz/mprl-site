<script setup>
import BlogContent from '@/Pages/Blog/Components/BlogContent.vue';
</script>
<template>
  <div>
    <!-- Category Selection -->
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

    <!-- FAQ Section -->
    <div class="mt-5">
      <div v-for="(faq, index) in filteredProjects" :key="faq.id" class="overflow-hidden border-b-2 py-2">
        <div @click="toggleFaq(index)" class="flex justify-between items-center cursor-pointer">
          <h3 class="font-bold text-lg text-blue-500">{{ faq.question }}</h3>
          <i :class="activeFaq === index ? 'fa-solid fa-chevron-up' : 'fa-solid fa-chevron-down'" class="text-xl"></i>
        </div>
        <div v-if="activeFaq === index" class="text-blue-600 text-sm mt-2">
          <BlogContent :body="faq.answer" />
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
    faqs: {
      type: Array,
      default: () => [],
      required: true,
    }
  },
  data() {
    return {
      selectedCategory: null,
      activeFaq: null, // Track the currently active FAQ
    };
  },
  computed: {
    filteredProjects() {
      if (this.selectedCategory === null) return this.faqs;
      return this.faqs.filter(faq => faq.category_id === this.selectedCategory);
    },
  },
  mounted() {
    if (this.projectCategory.length > 0) {
      this.selectedCategory = this.projectCategory[0].id;
    }
  },
  methods: {
    selectCategory(categoryId) {
      this.selectedCategory = categoryId;
      this.activeFaq = null; // Reset the active FAQ when category changes
    },
    toggleFaq(index) {
      this.activeFaq = this.activeFaq === index ? null : index;
    }
  },
};
</script>

<style>
.active-tab {
  font-weight: bold;
  color: #003e57;
  border-bottom: 2px solid #00b050;
}
.inactive-tab {
  color: #c0c0c0;
}
</style>
