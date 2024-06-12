<script setup>
import { Link } from '@inertiajs/vue3';
import { ref } from 'vue';

const isHovered = ref(false);

const handleMouseOver = () => {
    isHovered.value = true;
};

const handleMouseLeave = () => {
    isHovered.value = false;
};
</script>

<template>
    <div id="my-hover" class="flex flex-col border rounded-b-lg shadow-md bg-white min-h-96 hover:bg-black hover:bg-opacity-25 transition-all duration-200 relative">
        <Link @mouseover="handleMouseOver" @mouseleave="handleMouseLeave" class="h-3/4" :href="`/blog/${blog.id}`">
            <div v-if="blog.images" class="mb-4">
                <div class="flex flex-wrap -mx-2">
                    <div v-for="image in blog.images" :key="image.id" class="w-1/3 px-2 mb-4 overflow-hidden">
                        <img :src="'storage/' + image.image" :alt="image.image" class="inset-0 w-full h-full object-cover object-center">
                    </div>
                </div>
            </div>
        </Link>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2" v-if="isHovered">
            <span class="underline text-white">Read Article</span>
        </div>
        <div class="h-1/4 w-full px-5 flex flex-col">
            <div class="h-1/2">
                <h2 class="text-2xl font-semibold mb-2">{{ blog.title }}</h2>
            </div>
            <div class="h-1/2 flex space-x-3 font-light text-sm items-center">
                <i class="pi pi-calendar"></i>
                <p class="text-gray-500 text-sm">{{ formatDate(blog.created_at) }}</p>
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
    }
}
</script>

<style scoped>
#my-hover:hover {
    transform: scale(1.02);
    filter: blur(.02em);
}
</style>
