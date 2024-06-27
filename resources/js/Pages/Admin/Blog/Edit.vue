<template>
    <div>
        {{ blog.images }}
    </div>
</template>

<script setup>
    const props = defineProps({
        blog:{
            type: Object,
            required: true
        }
    });
</script>

<style scoped>

</style>