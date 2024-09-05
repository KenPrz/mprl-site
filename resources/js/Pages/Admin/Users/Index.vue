
<script setup>
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
    import UsersTable from './Components/UsersTable.vue';
    const props = defineProps({
        users: {
            type: Object,
            default: () => ({})
        }
    })
</script>
<template>
    <AuthenticatedLayout>    
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <UsersTable 
                    :users="props.users"
                />
            </div>
        </div>
</AuthenticatedLayout>
</template>
<style scoped>

</style>