<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Admin: Blog" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="flex justify-end">
                    <Link class="bg-main-400 px-2 py-1 rounded-md text-white hover:bg-main-500 mb-2" :href="route('admin.blog.create')">
                        Create
                    </Link>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">Welcome Admin!</div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
