<script setup>
defineProps({
    user: Object,
});
defineEmits(['close']);
</script>

<template>
    <div class="p-6">
        <h2 class="text-lg font-medium text-gray-900">User Details</h2>
        <p class="mt-1 text-sm text-gray-600">
            <strong>Name:</strong> {{ user.first_name }} {{ user.last_name }}<br>
            <strong>Email:</strong> {{ user.email }}<br>
            <strong>Role:</strong> {{ user.role_id }}<br>
            <strong>Google User:</strong> {{ user.is_google_user ? 'Yes' : 'No' }}<br>
            <strong>Created At:</strong> {{ new Date(user.created_at).toLocaleDateString() }}
        </p>
        <div class="mt-6">
            <button type="button" @click="$emit('close')" class="inline-flex justify-center rounded-md border border-transparent bg-blue-100 px-4 py-2 text-sm font-medium text-blue-900 hover:bg-blue-200 focus:outline-none focus-visible:ring-2 focus-visible:ring-blue-500 focus-visible:ring-offset-2">Close</button>
        </div>
    </div>
</template>