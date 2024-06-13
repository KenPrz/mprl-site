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
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0" :style="`background-image: url('${props.bgLink}');`">
        <div>
            <Link href="/">
                <ApplicationLogo class="w-auto h-24 fill-current text-gray-500" />
            </Link>
        </div>
        <div
            class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg mx-5"
        >
            <slot />
        </div>
    </div>
</template>
<style scoped>
</style>
