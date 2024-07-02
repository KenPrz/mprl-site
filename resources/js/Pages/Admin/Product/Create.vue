<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import Toggle from '@/Components/Toggle.vue';
import { Head } from '@inertiajs/vue3';
import { ref, onMounted } from 'vue';
import { Link, useForm } from '@inertiajs/vue3';
import { QuillDeltaToHtmlConverter } from 'quill-delta-to-html';
import { VueDraggableNext } from 'vue-draggable-next';

const props = defineProps({
    categories: {
        type: Array,
        required: true
    }
});
const form = useForm({
    images: [],
    category: '',
    title: '',
    content: '',
    is_published: true,
    is_featured: false
});
</script>

<template>
    <Head title="Add Product" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">New Product Information Form</h2>
        </template>
        <div class="p-2">
            <div class="flex flex-col space-y-5 max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="flex justify-start">
                    <Link class="bg-main-400 px-2 py-1 rounded-md text-white hover:bg-main-500 mb-2" :href="route('admin.products.index')">
                        <i class="fa-solid fa-arrow-left px-4"></i><span>Go Back</span>
                    </Link>
                </div>
                <div class="w-full bg-white rounded-md p-4 shadow-md space-y-2">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div class="col-span-1">
                            <label for="form-name" class="block text-lg font-medium text-gray-700">Product Name</label>
                            <input id="form-title" class="w-full mt-1 p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" type="text">
                        </div>
                        <div class="col-span-1">
                            <label for="form-category" class="block text-lg font-medium text-gray-700">Select Category</label>
                            <select id="category" class="w-full mt-1 p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                <option disabled default>Category</option>
                                <option v-for="category in props.categories" :key="category.id" :value="category.id">{{category.name}}</option>
                            </select>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div class="col-span-1">
                            <label for="prod-name" class="block text-lg font-medium text-gray-700">Decription</label>
                            <textarea class="w-full h-5/6 border-2 rounded-md "ame="" id=""></textarea>
                        </div>
                        <div class="col-span-1">
                            <div class="flex justify-between">
                                <label for="prod-name" class="block text-lg font-medium text-gray-700 p-3">Image/s <sup>(max 3 images uplaod)</sup></label>
                                <div class="flex justify-between items-center mt-2">
                                    <div class="bg-green-500 px-2 py-1 rounded-lg text-white">
                                        <button class="flex">
                                            <i class="fa-solid fa-plus text-xl"></i>
                                            <span class="ml-1 hidden sm:flex items-center">Add Images</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-gray-300 rounded-lg w-full h-56 mt-2"></div>
                        </div>
                    </div>

                    <p>Product Specifications</p>
                    <div class="border-t-4 pt-4">
                        <p>General Information<sup class="ml-1 font-bold">Please fill out the fields with "*"</sup></p>
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 mt-3">
                            <div>
                                <label for="form-price" class="block text-lg font-medium text-gray-700">Current Price</label>
                                <input id="form-price" class="w-full mt-1 p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" type="text">
                            </div>
                            <div>
                                <label for="form-discount" class="block text-lg font-medium text-gray-700">Discount</label>
                                <input id="form-discount" class="w-full mt-1 p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" type="text">
                            </div>
                            <div>
                                <label for="form-warranty" class="block text-lg font-medium text-gray-700">Warranty*</label>
                                <input id="form-warranty" class="w-full mt-1 p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" type="text">
                            </div>
                            <div>
                                <label for="form-stock-level" class="block text-lg font-medium text-gray-700">Stock Level</label>
                                <input id="form-stock-level" class="w-full mt-1 p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" type="text">
                            </div>
                            <div>
                                <label for="form-supplier" class="block text-lg font-medium text-gray-700">Supplier*</label>
                                <input id="form-supplier" class="w-full mt-1 p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" type="text">
                            </div>
                            <div>
                                <label for="is_featured" class="block text-lg font-medium text-gray-700">Displayed</label>
                                <Toggle v-model="form.is_featured" class="mt-3" />
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </AuthenticatedLayout>

</template>