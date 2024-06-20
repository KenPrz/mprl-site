<script setup>
import {defineProps} from 'vue';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    bgLink: {
        type: String,
        default: '/images/solar-header-bg.jpg'
    },
})
</script>

<template>
    <div id="layout" class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0" :style="`background-image: url('${props.bgLink}');`">
        <div
            class="w-full sm:max-w-4xl mt-6 p-2 bg-white shadow-md overflow-hidden sm:rounded-lg mx-5"
        >
            <slot />
        </div>
    </div>
</template>
<style scoped>
#layout {
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;
}
</style>
