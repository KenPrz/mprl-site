
<script setup>
    import { ref } from 'vue';
    import Pagination from '@/Components/Pagination.vue';
    const props = defineProps({
        users: {
            type: Array,
            default: []
        }
    })
</script>
<template>
    <div>
        {{ props.users }}
    </div>
    <div>
        <Pagination 
            :data="props.users"
            :links="props.users.links"
        />
    </div>
</template>
<style scoped>

</style>