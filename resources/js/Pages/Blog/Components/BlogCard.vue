<script setup>
import { Link } from '@inertiajs/vue3';
import { ref, computed } from 'vue';
import BlogImage from './BlogImage.vue';

const isHovered = ref(false);
const isMobile = ref(false);

const handleMouseOver = () => {
  if (!isMobile.value) {
    isHovered.value = true;
  }
};

const handleMouseLeave = () => {
  if (!isMobile.value) {
    isHovered.value = false;
  }
};

const checkMobile = () => {
  isMobile.value = window.innerWidth < 768; // Adjust this breakpoint as needed
};

const hoverEffectsActive = computed(() => isHovered.value && !isMobile.value);

// Check on mount and add resize listener
if (typeof window !== 'undefined') {
  checkMobile();
  window.addEventListener('resize', checkMobile);
}
</script>

<template>
  <div 
    class="mb-2 border card-height rounded-b-sm shadow-md relative overflow-hidden cursor-pointer"
  >
    <div class="relative"
        @mouseover="handleMouseOver"
        @mouseleave="handleMouseLeave"
    >
      <Link :href="route('blog.show', blog.id)" class="block">
        <BlogImage
          class="card-image-height transition-all duration-300"
          :class="{ 'blur-2xs': hoverEffectsActive }"
          :imageUrl="`storage/${blog.image}`"
          :alt="blog.title"
        />
        <div
          class="absolute inset-0 flex items-center justify-center opacity-0 transition-opacity duration-300"
          :class="{ 'opacity-100': hoverEffectsActive }"
        >
          <span class="text-white text-xl underline transition-colors duration-200">
            Read Article
          </span>
        </div>
      </Link>
    </div>
    
    <div class="relative flex flex-col p-2 px-4 flex-grow">
      <div class="my-2 flex flex-wrap font-light text-xs mb-1 text-gray-600">
        <template v-for="(category, index) in blog.categories" :key="category.id">
          <Link
            :href="route('blog.index', { category: category.id })"
            class="hover:text underline"
          >
            {{ category.name }}
          </Link>
          <span v-if="index < blog.categories.length - 1" class="mx-1">|</span>
        </template>
      </div>
      <h1 class="text-xl font-semibold mb-2">
        <Link class="hover:text-main-500 duration-300 transition-colors" :href="`/blog/${blog.id}`">
          {{ blog.title }}
        </Link>
      </h1>
      <div class="flex space-x-2 items-center font-light text-sm text-gray-700">
        <span>{{ 'By ' + blog.user_name }}</span>
      </div>
      <div class="mt-auto pt-2 text-sm text-gray-600 space-x-2">
        <i class="pi pi-calendar"></i>
        <span>{{ formatDate(blog.created_at) }}</span>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'BlogCard',
  props: {
    blog: {
      type: Object,
      required: true
    }
  },
  methods: {
    formatDate(date) {
      const options = {year: 'numeric', month: 'long', day: 'numeric'};
      return new Date(date).toLocaleDateString(undefined, options);
    },
  },
}
</script>

<style scoped>
.card-height {
  height: 32em;
}
.card-image-height {
  width: 100%;
  height: 20em;
  object-fit: cover;
}

@media (max-width: 767px) {
  .card-height {
    height: auto;
  }
  .card-image-height {
    height: 15em;
  }
}
</style>