<script setup>
import { useForm } from '@inertiajs/vue3';

const props = defineProps({
    user: Object,
});

const emit = defineEmits(['close']);

const form = useForm({});

function submit() {
    form.delete(route('admin.users.destroy', props.user.id), {
        preserveScroll: true,
        preserveState: true,
        onSuccess: () => emit('close'),
    });
}
</script>

<template>
    <div class="p-6">
        <h2 class="text-lg font-medium text-gray-900">Delete User</h2>
        <p class="mt-1 text-sm text-gray-600">
            Are you sure you want to delete this user? This action cannot be undone.
        </p>
        <div class="mt-6 flex justify-end">
            <button type="button" @click="$emit('close')" class="mr-3 inline-flex justify-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Cancel</button>
            <button @click="submit" class="inline-flex justify-center rounded-md border border-transparent bg-red-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">Delete</button>
        </div>
    </div>
</template>