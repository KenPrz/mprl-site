<template>
    <div class="content-wrapper" v-html="props.body"></div>
</template>

<script setup>
const props = defineProps({
    body: {
        required: true
    }
});
</script>

<style scoped>
    :deep(.content-wrapper) {
        font-family: Arial, sans-serif;
        line-height: 1.6;
        color: #333;
        padding: 1rem;
    }

    :deep(h1) {
        font-size: 2.5rem;
        margin-bottom: 1.5rem;
        text-wrap: balance;
        color: #2c3e50;
    }

    :deep(h2) {
        font-size: 2rem;
        margin-bottom: 1.5rem;
        text-wrap: balance;
        color: #34495e;
    }

    :deep(h3) {
        font-size: 1.75rem;
        margin-bottom: 1.5rem;
        text-wrap: balance;
        color: #7f8c8d;
    }

    :deep(h4) {
        font-size: 1.5rem;
        margin-bottom: 1.5rem;
        text-wrap: balance;
        color: #95a5a6;
    }

    :deep(h5) {
        font-size: 1.25rem;
        margin-bottom: 1.5rem;
        text-wrap: balance;
        color: #bdc3c7;
    }

    :deep(h6) {
        font-size: 1rem;
        margin-bottom: 1.5rem;
        text-wrap: balance;
        color: #ecf0f1;
    }

    :deep(p) {
        margin-bottom: 1.5rem;
        text-wrap: pretty;
        color: #2c3e50;
    }

    :deep(a) {
        color: #3498db;
        text-decoration: none;
    }

    :deep(a:hover) {
        text-decoration: underline;
    }

    :deep(img) {
        max-width: 100%;
        height: auto;
        margin-bottom: 1.5rem;
    }

    :deep(blockquote) {
        margin: 1.5rem 0;
        padding: 1rem;
        background-color: #f9f9f9;
        border-left: 5px solid #ccc;
        color: #555;
    }

    :deep(ul) {
        list-style-type: disc;
        margin: 1.5rem 0;
        padding-left: 2rem;
    }

    :deep(ol) {
        list-style-type: decimal;
        margin: 1.5rem 0;
        padding-left: 2rem;
    }

    :deep(li) {
        margin-bottom: 0.5rem;
    }

    :deep(code) {
        font-family: "Courier New", Courier, monospace;
        background-color: #f5f5f5;
        padding: 0.2rem 0.4rem;
        border-radius: 4px;
    }

    :deep(pre) {
        background-color: #f5f5f5;
        padding: 1rem;
        border-radius: 4px;
        overflow-x: auto;
    }
</style>
