<template>
    <div v-html="props.body"></div>
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
::v-deep p {
    font-weight: 400;
}
</style>