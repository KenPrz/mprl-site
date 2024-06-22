<script setup>
const pops = defineProps({
    roundedClass: {
        type: String,
        default: 'rounded-full'
    },
    paddingClass: {
        type: String,
        default: 'p-4'
    },
    bgClass: {
        type: String,
        default: 'bg-main-500'
    },
})
</script>
<template>
    <button
        :class="[roundedClass, paddingClass, bgClass]"
        class="inline-flex items-center border border-transparent font-semibold text-xs text-white uppercase tracking-widest hover:bg-main-600 focus:bg-main-600 active:bg-main-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150"
    >
        <slot />
    </button>
</template>
