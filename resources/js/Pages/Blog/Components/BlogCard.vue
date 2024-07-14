<script setup>
import { Link } from '@inertiajs/vue3';
import { ref } from 'vue';
import BlogImage from './BlogImage.vue';
const isHovered = ref(false);

const handleMouseOver = () => {
    isHovered.value = true;
};
const handleMouseLeave = () => {
    isHovered.value = false;
};
</script>

<template>
    <div :id="isHovered ? 'my-hover' : ''" @mouseover="handleMouseOver" @mouseleave="handleMouseLeave" class="mb-2 border card-height rounded-b-sm shadow-md">
        <Link :href="route('blog.show', blog.id)">
            <BlogImage class="card-image-height" :imageUrl="`storage/${blog.image}`" :alt="blog.title" /> 
        </Link>
        <div class="relative card-descr-h flex flex-col p-2 px-4 justify-around">
            <div class="flex flex-wrap font-light text-xs mb-1 text-gray-600">
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
            <h1 class="text-xl font-semibold">
                <Link class="hover:text-main-500 duration-300 transition-colors" :href="`/blog/${blog.id}`">
                    {{ blog.title }}
                </Link>
            </h1>
            <div class="flex space-x-2 items-center font-light text-sm text-gray-700">
                <span>{{ 'By ' + blog.user_name }} • </span>
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

#my-hover {
    transform: scale(1.02);
    filter: blur(.02em);
}
.card-height {
    height: 32em;
}
.card-image-height {
    width: 100%;
    height: 20em;
    object-fit: contain;
  }
.card-descr-h{
    height: 40%;
}
</style>
