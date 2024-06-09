<template>
    <div class="p-4 border rounded-lg shadow-md bg-white">
        <h2 class="text-2xl font-bold mb-2">{{ blog.title }}</h2>
        <p class="text-gray-700 mb-4">{{ blog.body }}</p>
        <div v-if="blog.images && blog.images.length" class="mb-4">
            <h3 class="text-xl font-semibold mb-2">Images:</h3>
            <div class="flex flex-wrap -mx-2">
                <div v-for="image in blog.images" :key="image.id" class="w-1/3 px-2 mb-4">
                    {{ image.image }}
                    
                    <img :src="'storage/'+ image.image" alt="Blog Image" class="w-full h-auto rounded" />
                </div>
            </div>
        </div>
        <p class="text-gray-500 text-sm">Posted on {{ formatDate(blog.created_at) }}</p>
    </div>
</template>

<script>
export default {
    name: 'BlogCard',
    props: {
        blog: Object
    },
    methods: {
        formatDate(date) {
            const options = { year: 'numeric', month: 'long', day: 'numeric' };
            return new Date(date).toLocaleDateString(undefined, options);
        }
    }
}
</script>

<style scoped>
</style>
