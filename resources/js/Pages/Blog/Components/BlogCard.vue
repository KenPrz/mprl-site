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
        <Link :href="route('blog.show',blog.id)">
            <BlogImage class="card-image-height" v-for="image in blog.images" :key="image.id" :imageUrl="`storage/${image.image}`" />
        </Link>
        <div class="relative card-descr-h flex flex-col p-2 px-4 justify-around">
            <div class="flex flex-wrap font-light text-xs space-x-2 mb-1 text-gray-600">
                <span v-for="tag in tags">
                    <Link :href="`/blog/${blog.id}`"><span class="underline">{{tag}}</span>{{' |'}}</Link>
                </span>
            </div>
            <h1 class="text-xl font-semibold">
                <Link class="hover:text-main-500 duration-300 transition-colors" :href="`/blog/${blog.id}`">
                    {{ blog.title }}
                </Link>
            </h1>
            <div class="flex space-x-2 items-center font-light text-sm text-gray-700">
                <span>{{'By '+blog.user_name}} • </span>
                <span>{{formatDate(blog.created_at)}}</span>
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

const tags = [
    'Solar Panel',
    'Solar Energy',
    'Renewable Energy',
]
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
