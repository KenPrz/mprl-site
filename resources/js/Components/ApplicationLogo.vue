<template>
    <!-- <div class="relative flex items-center">
        <img :src="logo" class="h-16 w-auto" alt="Logo">
        <div class="absolute left-[55px] top-[17px] w-full">
            <div class="hidden sm:block md:text-md sm:text-sm mt-[5px] font-semibold text-main-600 dark:text-gray-200">{{ appName }}</div>
            <div :class="isDark ? 'text-yellow-500' : 'text-red-500'" class="hidden sm:block sm:text-2xs text-red-500 dark:text-gray-400">{{ subAppName }}</div>
        </div>
    </div> 
    
        this is the original code -->
    <div>
        <img class="h-20" :src="'/logo.svg'" alt="" srcset="">
    </div>
</template>
<script setup>
    const props = defineProps({
        isDark: {
            type: Boolean,
            required: false,
            default: false
        },
        appName: {
            type: String,
            required: false,
            default: 'neMPR'
        },
        subAppName: {
            type: String,
            required: false,
            default: 'Sunpower'
        },
        logo: {
            type: String,
            required: false,
            default: '/onempr.svg'
        }
    });
</script>

<style scoped>

</style>