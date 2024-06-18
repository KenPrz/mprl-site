<template>
    <div class="content-wrapper" v-html="props.body"></div>
</template>

<script setup>
const props = defineProps({
    body: {
        type: String,
        required: true
    }
})
</script>

<style scoped>
    :deep(h1) {
        font-size: 2.5rem;
        margin-bottom: 1.5rem;
        text-wrap: balance;
    }
    :deep(h2) {
        font-size: 2rem;
        margin-bottom: 1.5rem;
        text-wrap: balance;
    }
    :deep(h3) {
        font-size: 1.75rem;
        margin-bottom: 1.5rem;
        text-wrap: balance;
    }
    :deep(h4) {
        font-size: 1.5rem;
        margin-bottom: 1.5rem;
        text-wrap: balance;
    }
    :deep(h5) {
        font-size: 1.25rem;
        margin-bottom: 1.5rem;
        text-wrap: balance;
    }
    :deep(h6) {
        font-size: 1rem;
        margin-bottom: 1.5rem;
        text-wrap: balance;
    }
    :deep(p) {
        margin-bottom: 1.5rem;
        text-wrap: pretty;
    }
    :deep(ul) {
        margin-bottom: 1.5rem;
        text-wrap: pretty;
    }
    :deep(ol) {
        margin-bottom: 1.5rem;
        text-wrap: pretty;
    }
    :deep(blockquote) {
        margin-bottom: 1.5rem;
        text-wrap: pretty;
    }
    :deep(pre) {
        margin-bottom: 1.5rem;
        text-wrap: pretty;
    }
    :deep(code) {
        margin-bottom: 1.5rem;
        text-wrap: pretty;
    }
    :deep(table) {
        margin-bottom: 1.5rem;
        text-wrap: pretty;
    }
    :deep(img) {
        margin-bottom: 1.5rem;
        text-wrap: pretty;
    }
    :deep(a) {
        margin-bottom: 1.5rem;
        text-wrap: pretty;
    }
    :deep(hr) {
        margin-bottom: 1.5rem;
        text-wrap: pretty;
    }
</style>
