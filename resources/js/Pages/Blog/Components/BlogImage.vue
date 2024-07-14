<template>
    <div class="w-full h-full overflow-hidden">
        <img :src="imageUrl" :alt="alt" :classes="classes" class="object-cover w-full h-full">
    </div>
</template>

<script setup>
    import { defineProps } from 'vue';

    const props = defineProps({
        imageUrl: {
            type: String,
            required: true
        },
        alt: {
            type: String,
            default: ''
        },
        classes : {
            type: String,
            default: ''
        }
    });
</script>

<style scoped>
</style>