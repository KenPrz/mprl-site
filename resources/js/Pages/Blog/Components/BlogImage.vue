<template>
    <div class="w-full h-full overflow-hidden">
        <img :src="imageUrl" :alt="imageUrl" :classes="classes" class="object-cover w-full h-full">
    </div>
</template>

<script setup>
    import { defineProps } from 'vue';

    const props = defineProps({
        imageUrl: {
            type: String,
            required: true
        },
        classes : {
            type: String,
            default: ''
        }
    });
</script>

<style scoped>
</style>