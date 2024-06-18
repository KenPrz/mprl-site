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
    ::v-deep h1 {
        font-size: 2.5rem;
        margin-bottom: 1.5rem;
        text-wrap: balance;
    }
    ::v-deep h2 {
        font-size: 2rem;
        margin-bottom: 1.5rem;
        text-wrap: balance;
    }
    ::v-deep h3 {
        font-size: 1.75rem;
        margin-bottom: 1.5rem;
        text-wrap: balance;
    }
    ::v-deep h4 {
        font-size: 1.5rem;
        margin-bottom: 1.5rem;
        text-wrap: balance;
    }
    ::v-deep h5 {
        font-size: 1.25rem;
        margin-bottom: 1.5rem;
        text-wrap: balance;
    }
    ::v-deep h6 {
        font-size: 1rem;
        margin-bottom: 1.5rem;
        text-wrap: balance;
    }
    ::v-deep p {
        margin-bottom: 1.5rem;
        text-wrap: pretty;
    }
    ::v-deep ul {
        margin-bottom: 1.5rem;
        text-wrap: pretty;
    }
    ::v-deep ol {
        margin-bottom: 1.5rem;
        text-wrap: pretty;
    }
    ::v-deep blockquote {
        margin-bottom: 1.5rem;
        text-wrap: pretty;
    }
    ::v-deep pre {
        margin-bottom: 1.5rem;
        text-wrap: pretty;
    }
    ::v-deep code {
        margin-bottom: 1.5rem;
        text-wrap: pretty;
    }
    ::v-deep table {
        margin-bottom: 1.5rem;
        text-wrap: pretty;
    }
    ::v-deep img {
        margin-bottom: 1.5rem;
        text-wrap: pretty;
    }
    ::v-deep a {
        margin-bottom: 1.5rem;
        text-wrap: pretty;
    }
    ::v-deep hr {
        margin-bottom: 1.5rem;
        text-wrap: pretty;
    }
</style>
