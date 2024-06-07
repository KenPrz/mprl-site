<script setup>
import { computed } from 'vue';
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    href: {
        type: String,
        required: true,
    },
    active: {
        type: Boolean,
    },
    is_black: {
        type: Boolean,
    },
});

const classes = computed(() =>
    props.active
        ? 'text-offset-500 hover:text-offset-700'
        : (props.is_black ? 'text-black hover:text-black' : 'text-white hover:text-offset-500')
);
</script>


<template>
    <Link :href="href" :class="classes">
        <slot />
    </Link>
</template>
