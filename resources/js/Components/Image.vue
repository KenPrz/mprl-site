<template>
    <div class="relative w-full h-full overflow-hidden rounded">
        <img :src="'storage/'+ image.image" alt="Blog Image" :class="['absolute inset-0 w-full h-full object-cover', classes]" />
    </div>
</template>

<script setup>
defineProps({
    image: {
        type: Object,
        required: true
    },
    classes: {
        type: String,
        default: ''
    }
});
</script>

<style scoped>
/* Additional scoped styles if needed */
</style>
