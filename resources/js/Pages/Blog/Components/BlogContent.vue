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
        font-size: 1.75rem;
        margin-bottom: 1.5rem;
        text-wrap: balance;
        color: #2c3e50;
    }

    :deep(h2) {
        font-size: 1.5rem;
        margin-bottom: 1.5rem;
        text-wrap: balance;
        color: #34495e;
    }

    :deep(h3) {
        font-size: 1.25rem;
        margin-bottom: 1.5rem;
        text-wrap: balance;
        color: #34495e;
    }

    :deep(h4) {
        font-size: 1rem;
        margin-bottom: 1.5rem;
        text-wrap: balance;
        color: #34495e;
    }

    :deep(h5) {
        font-size: .75rem;
        margin-bottom: 1.5rem;
        text-wrap: balance;
        color: #34495e;
    }

    :deep(h6) {
        font-size: .5rem;
        margin-bottom: 1.5rem;
        text-wrap: balance;
        color: #34495e;
    }

    :deep(p) {
        margin-bottom: 1rem;
        text-wrap: pretty;
        color: #2c3e50;
    }

    :deep(a:hover) {
        text-decoration: underline;
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

    :deep(hr) {
        border: 0;
        border-top: 1px solid #ccc;
        margin: 1.5rem 0;
    }
</style>
